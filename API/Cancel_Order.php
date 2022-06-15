<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_DH = $_POST['Ma_DH'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

        $queryInsert = "UPDATE `don_hang` SET `Trang_Thai` = '0' WHERE `don_hang`.`Ma_DH` = '$Ma_DH'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Hủy đơn hàng thành công';
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Hủy đơn hàng $Ma_DH','$Account','$date')");
            echo json_encode($asd);
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>