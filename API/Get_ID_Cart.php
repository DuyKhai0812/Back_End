<?php
require 'Connect.php';
$Ma_DH = $_GET['Ma_DH'];
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `don_hang` WHERE `Ma_DH` = '$Ma_DH'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $thu['Ma_DH'] = $row['Ma_DH'];
        $thu['Ngay_Ban'] = $row['Ngay_Ban'];    
        $thu['Tong_Tien'] = $row['Tong_Tien'];
        $thu['Giao_Hang'] = $row['Giao_Hang'];
        $thu['Ma_KH'] = $row['Ma_KH'];
        $thu['Ma_NV'] = $row['Ma_NV'];
        $thu['Dia_Chi_Giao'] = $row['Dia_Chi_Giao'];
        $thu['Ghi_Chu'] = $row['Ghi_Chu'];
        $thu['Trang_Thai'] = $row['Trang_Thai'];
        $thu['Khuyen_Mai'] = $row['Tong_Tien']*$row['Khuyen_Mai']/100;
        $thu['Thanh_Tien'] = $row['Tong_Tien'] - ($row['Tong_Tien'] * $row['Khuyen_Mai'] / 100);
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>