<?php
require 'Connect.php';
$thu = [];
$ss = $_GET['1']; 
$we = [];
$test = ['Đà Lạt xanh','Coop Food','Trang Vảng','Vin Mart','Nông trại xanh'];
$i = 0;
//$name = $_POST['name'];
//Lệnh thực thi sql

$sql = "SELECT DATE_FORMAT(Ngay_Ban, '%m/%Y') AS name ,SUM(Thanh_Tien) as value FROM don_hang dh,ct_don_hang ct,san_pham sp,nxs sx WHERE sx.Ten_NSX = '$test[$ss]' AND dh.Ma_DH = ct.Ma_DH AND ct.Ma_SP = sp.Ma_SP AND sp.Ma_NSX = sx.Ma_NSX GROUP BY  MONTH(Ngay_Ban),sp.Ma_NSX ORDER BY  `Ngay_Ban` ASC LIMIT 7";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    
    while($row = $result->fetch_assoc())
    {
        $thu["name"] = $test[$ss];
        $row["value"] = $row["value"] * 1;
        $we[$cr] = $row;
        $thu["series"] = $we;
        $cr ++; 
    }
    
}
else
{
    $cr = 0;
        $thu["name"] = $test[$ss];
        $row["name"] = 0;
        $row["value"] = 0;
        $thu["series"] = $row;    
        
}
echo json_encode($thu);


?>