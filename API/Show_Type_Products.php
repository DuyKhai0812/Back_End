<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `loai_sp` WHERE 1";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_LSP'] = $row['Ma_LSP'];
        $thu[$cr]['Ten_LSP'] = $row['Ten_LSP'];    
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>