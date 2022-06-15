<?php
require_once "Connect.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ERROR);

$Ma_SP = $_POST['Ma_SP'];

$thu = [];
$sql="SELECT * FROM `san_pham` WHERE Ma_SP = '$Ma_SP'";
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result) == 1)
    {
        $thu['Status'] = 3; 
    }
else
    {
        $thu['Status'] = 2;
    }
    echo json_encode($thu);
?>