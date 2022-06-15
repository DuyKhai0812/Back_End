<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_NV  = $_POST['Ma_NV'];
$Ten_NV  = $_POST['Ten_NV'];
$Ngay_Sinh  = $_POST['Ngay_Sinh'];
$Gioi_Tinh  = $_POST['Gioi_Tinh'];
$Dia_Chi  = $_POST['Dia_Chi'];
$SDT  = $_POST['SDT'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;
    $sqlcheckPhoneNumber = mysqli_query($conn,"SELECT SDT FROM nhan_vien WHERE SDT = $SDT and Ma_NV != '$Ma_NV'");
    if(mysqli_num_rows($sqlcheckPhoneNumber) == 0)
    {
        $queryInsert = "UPDATE `nhan_vien` SET `Ten_NV`='$Ten_NV',`Ngay_Sinh`='$Ngay_Sinh',`Gioi_Tinh`='$Gioi_Tinh',`Dia_Chi`='$Dia_Chi',`SDT`='$SDT' WHERE `Ma_NV`='$Ma_NV'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công sửa nhân viên';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Sửa nhân viên $Ten_NV','$Account','$date')");
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }
    }
    else
    {
        $asd['status'] = false;
        $asd['message'] = 'Số điện thoại đã tồn tại';
        echo json_encode($asd);
    }
        

    

?>