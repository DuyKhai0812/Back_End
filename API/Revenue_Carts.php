<?php
require 'Connect.php';
$thu = [];
$we = [];
//Lệnh thực thi sql
$sql = "SELECT DATE_FORMAT(Ngay_Ban, '%m/%Y') AS name,Tong_Tien as value FROM `don_hang` WHERE Trang_Thai GROUP BY name ORDER BY `Ngay_Ban` ASC ";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu['name'] = "Month"; 
        $row['value'] = $row['value'] * 1;  
        $we[$cr] = $row;
        $thu['series'] = $we;
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>