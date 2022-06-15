<?php
require_once "./Connect.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ERROR);

$Ma_DH = $_POST['Ma_DH'];
$Ma_KH = $_POST['Ma_KH'];
$Ma_NV = $_POST['Ma_NV'];
$Dia_Chi_Giao = $_POST['Dia_Chi_Giao'];
$Ghi_Chu = $_POST['Ghi_Chu'];
$Khuyen_Mai = $_POST['Khuyen_Mai'];
$Trang_Thai = 1;
$Ngay_Ban = date('Y-m-d h:i:s',time());
$TongTien = 0;
$Giao_Hang = 0;

$So_SP = $_POST['So_SP'];
$Ma_SP[] = $_POST['Ma_SP'];
$SL[] = $_POST['SL'];

$sql = "INSERT INTO `don_hang`(`Ma_DH`, `Ngay_Ban`, `Tong_Tien`, `Giao_Hang`, `Ma_KH`, `Ma_NV`, `Dia_Chi_Giao`, `Ghi_Chu`, `Khuyen_Mai`, `Trang_Thai`) 
VALUES ('$Ma_DH','$Ngay_Ban','$TongTien','$Giao_Hang','$Ma_KH','$Ma_NV','$Dia_Chi_Giao','$Ghi_Chu','$Khuyen_Mai','$Trang_Thai')";

$result = mysqli_query($conn,$sql);
if($result)
{
    $asd['status1'] = true;
    $asd['message1'] = 'Thành công tạo đơn hàng';
    echo json_encode($asd);
}
else
{
    $asd['status1'] = false;
    $asd['message1'] = 'Không kết nối được cơ sở dữ liệu';
    $asd['bug'] = mysqli_error($conn);
    echo json_encode($asd);
}

?>