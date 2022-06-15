<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dateY = date('Y', time());

require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT SUM(Tong_Tien) as Total_Year FROM don_hang WHERE YEAR(Ngay_Ban) = $dateY";
$result = $conn->query($sql);
//Show API
if($result->num_rows == 1)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        if($row['Total_Year'] == 0)
        {
            $thu['Total_Year'] = 0;  
            $thu['Year'] = $dateY;
        }
        else
        {
            $thu['Total_Year'] = $row['Total_Year'];  
            $thu['Year'] = $dateY;
        }
        //$thu['Status'] = 'Doanh thu tháng $date' + $row['Total_Month']; 
    }
    echo json_encode($thu);
}


?>