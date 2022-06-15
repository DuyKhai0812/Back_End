<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$KichHoat = $_POST['KichHoat'];
$Ma_NV = $_POST['Ma_NV'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

        $queryInsert = "UPDATE `tk_nv` SET `KichHoat`='$KichHoat' WHERE `Ma_NV` = '$Ma_NV'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công kích hoạt';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Kích hoạt tài khoản nhân viên $Ma_NV','$Account','$date')");

        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>