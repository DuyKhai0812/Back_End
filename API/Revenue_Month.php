<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dateM = date('m', time());
$dateY = date('Y', time());

require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT SUM(Tong_Tien) as Total_Month FROM don_hang WHERE MONTH(Ngay_Ban) = $dateM AND YEAR(Ngay_Ban) = $dateY";
$result = $conn->query($sql);
//Show API
if($result->num_rows == 1)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        if($row['Total_Month'] == 0)
        {
            $thu['Total_Month'] = 0;  
            $thu['Month'] = $dateM;
            $thu['Year'] = $dateY;
        }
        else
        {
            $thu['Total_Month'] = $row['Total_Month'];  
            $thu['Month'] = $dateM;
            $thu['Year'] = $dateY;
        }
        //$thu['Status'] = 'Doanh thu tháng $date' + $row['Total_Month']; 
    }
    echo json_encode($thu);
}


?>