<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `nhan_vien` WHERE Ma_NV IN (SELECT Ma_NV FROM tk_nv)";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_NV'] = $row['Ma_NV'];
        $thu[$cr]['Ten_NV'] = $row['Ten_NV'];    
        $thu[$cr]['Ngay_Sinh'] = $row['Ngay_Sinh'];
        $thu[$cr]['Gioi_Tinh'] = $row['Gioi_Tinh'];
        $thu[$cr]['Dia_Chi'] = $row['Dia_Chi'];
        $thu[$cr]['SDT'] = $row['SDT'];
        $thu[$cr]['Check'] = 1;
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_NV'] = $row['Ma_NV'];
        $thu[$cr]['Ten_NV'] = $row['Ten_NV'];    
        $thu[$cr]['Ngay_Sinh'] = $row['Ngay_Sinh'];
        $thu[$cr]['Gioi_Tinh'] = $row['Gioi_Tinh'];
        $thu[$cr]['Dia_Chi'] = $row['Dia_Chi'];
        $thu[$cr]['SDT'] = $row['SDT'];
        $thu[$cr]['Check'] = 1;
        $cr++;
    }
    echo json_encode($thu);
}
?>