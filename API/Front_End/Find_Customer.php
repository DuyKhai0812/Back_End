<?php
require '../Connect.php';
$thu = [];
$Ma_KH = $_GET['Ma_KH'];
//Lệnh thực thi sql
$sql = "SELECT Ten_KH,Ngay_Sinh,CASE WHEN Gioi_Tinh = 0 THEN 'Nữ' WHEN Gioi_Tinh = 1 THEN 'Nam' END as Gioi_Tinh,Dia_Chi,SDT FROM `khach_hang` WHERE Ma_KH = '$Ma_KH'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ten_KH'] = $row['Ten_KH'];
        $thu[$cr]['Ngay_Sinh'] = $row['Ngay_Sinh'];
        $thu[$cr]['Dia_Chi'] = $row['Dia_Chi'];
        $thu[$cr]['Gioi_Tinh'] = $row['Gioi_Tinh'];
        $thu[$cr]['SDT'] = $row['SDT'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}