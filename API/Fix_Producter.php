<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());
$Ten_NSX  = $_POST['Ten_NSX'];
$Do_Tin_Cay  = $_POST['Do_Tin_Cay'];
$Ma_NSX  = $_POST['Ma_NSX'];
$Account = $_POST['Account'];


$error;

        $queryInsert = "UPDATE `nxs` SET `Ten_NSX`='$Ten_NSX',`Do_Tin_Cay`='$Do_Tin_Cay' WHERE `Ma_NSX`='$Ma_NSX '";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công sửa nhà sản xuất';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Cập nhật nhà sản xuất $Ten_NSX','$Account','$date')");
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>