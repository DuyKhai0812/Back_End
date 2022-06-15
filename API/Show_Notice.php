<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `notice` WHERE 1 ORDER BY ID DESC LIMIT 4 ";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Noi_Dung'] = $row['Noi_Dung'];    
        $thu[$cr]['Account'] = $row['Account'];
        $thu[$cr]['Ngay'] = $row['Ngay'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>