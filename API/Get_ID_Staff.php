<?php
require 'Connect.php';
$Ma_NV = $_GET['Ma_NV'];
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `nhan_vien` WHERE Ma_NV = '$Ma_NV'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu['Ma_NV'] = $row['Ma_NV'];
        $thu['Ten_NV'] = $row['Ten_NV'];    
        $thu['Ngay_Sinh'] = $row['Ngay_Sinh'];
        $thu['Gioi_Tinh'] = $row['Gioi_Tinh'];
        $thu['Dia_Chi'] = $row['Dia_Chi'];
        $thu['SDT'] = $row['SDT'];
        //$thu[$cr]['Check'] = 0;
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>