<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `nxs` WHERE 1";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_NSX'] = $row['Ma_NSX'];
        $thu[$cr]['Ten_NSX'] = $row['Ten_NSX'];    
        $thu[$cr]['Do_Tin_Cay'] = $row['Do_Tin_Cay'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>