<?php
require 'Connect.php';
$Ma_NSX = $_GET['Ma_NSX'];
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `nxs` WHERE Ma_NSX = '$Ma_NSX'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu['Ma_NSX'] = $row['Ma_NSX'];
        $thu['Ten_NSX'] = $row['Ten_NSX'];    
        $thu['Do_Tin_Cay'] = $row['Do_Tin_Cay'];
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>