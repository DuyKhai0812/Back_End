<?php
require '../Connect.php';

$Dia_Chi = $_GET['Dia_Chi'];
$Ma_KH = $_GET['Ma_KH'];

$sql = "UPDATE `khach_hang` SET `Dia_Chi`='$Dia_Chi' WHERE `Ma_KH`='$Ma_KH'";

$result = mysqli_query($conn,$sql);
    if($result)
    {
        $asd['status'] = true;
        $asd['message'] = 'Thành công sửa địa chỉ';
        echo json_encode($asd);
    }
    else
    {
        $asd['status'] = false;
        $asd['message'] = 'Lỗi không xác định';
        $asd['bug'] = mysqli_error($conn);
        echo json_encode($asd);
    }



?>