<?php
require '../Connect.php';
$thu = [];
$Ma_KH = $_GET['Ma_KH'];
//Lệnh thực thi sql
$sql = "SELECT * FROM `don_hang` WHERE Ma_KH = '$Ma_KH'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_DH'] = $row['Ma_DH'];
        $thu[$cr]['Ngay_Ban'] = $row['Ngay_Ban'];    
        $thu[$cr]['Tong_Tien'] = $row['Tong_Tien'];
        $thu[$cr]['Giao_Hang'] = $row['Giao_Hang'];
        $thu[$cr]['Ma_KH'] = $row['Ma_KH'];
        $thu[$cr]['Ma_NV'] = $row['Ma_NV'];
        $thu[$cr]['Dia_Chi_Giao'] = $row['Dia_Chi_Giao'];
        $thu[$cr]['Ghi_Chu'] = $row['Ghi_Chu'];
        $thu[$cr]['Khuyen_Mai'] = $row['Khuyen_Mai'];
        $thu[$cr]['Thanh_Tien'] = $row['Tong_Tien'] - ($row['Tong_Tien'] * $row['Khuyen_Mai'] / 100);
        $thu[$cr]['Trang_Thai'] = $row['Trang_Thai'];
        $cr++;
    }
    
}
else
{
    http_response_code(404);
}
echo json_encode($thu);
?>