<?php
require 'Connect.php';
$Ma_DH = $_POST['Ma_DH'];
$Ma_SP = $_POST['Ma_SP'];
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT Ma_DH,Ma_SP FROM `ct_don_hang` WHERE Ma_DH = '$Ma_DH' and Ma_SP = '$Ma_SP'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $thu['Ma_DH'] = $row['Ma_DH'];  
        $thu['Ma_SP'] = $row['Ma_SP'];
    
    }
    echo json_encode($thu);
}
else
{
    $thu['Ma_DH'] = $row['Ma_DH'];  
    $thu['Ma_SP'] = $row['Ma_SP'];
    echo json_encode($thu);
}
?>