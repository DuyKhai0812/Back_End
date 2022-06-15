<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT nv.Ma_NV,nv.SDT,Ten_NV,KichHoat FROM `nhan_vien` nv,`tk_nv` tk WHERE nv.Ma_NV = tk.Ma_NV AND nv.SDT = tk.SDT";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_NV'] = $row['Ma_NV'];
        $thu[$cr]['Ten_NV'] = $row['Ten_NV'];    
        $thu[$cr]['SDT'] = $row['SDT'];
        $thu[$cr]['KichHoat'] = $row['KichHoat'];
        $cr++;
    }
    echo json_encode($thu);
}
else if($result->num_rows == 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_NV'] = $row['Ma_NV'];
        $thu[$cr]['Ten_NV'] = $row['Ten_NV'];    
        $thu[$cr]['SDT'] = $row['SDT'];
        $thu[$cr]['KichHoat'] = $row['KichHoat'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>