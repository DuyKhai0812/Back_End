<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dateD = date('d', time());
$dateM = date('m', time());
$dateY = date('Y', time());

require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT SUM(Tong_Tien) as Total_Day FROM don_hang WHERE DAY(Ngay_Ban) = $dateD AND MONTH(Ngay_Ban) = $dateM AND YEAR(Ngay_Ban) = $dateY";
$result = $conn->query($sql);
//Show API
if($result->num_rows == 1)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        if($row['Total_Day'] == 0)
        {
            $thu['Total_Day'] = 0;  

        }
        else
        {
            $thu['Total_Day'] = $row['Total_Day'];  
        }
        //$thu['Status'] = 'Doanh thu tháng $date' + $row['Total_Day']; 
    }
    echo json_encode($thu);
}


?>