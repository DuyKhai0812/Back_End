<?php
require_once "Connect.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ERROR);
$TaiKhoan = $_POST['TaiKhoan'];
$Password = $_POST['Password'];
$thu = [];
$sql="SELECT tk.Ma_KH,TaiKhoan,kh.Ten_KH FROM `tk_kh` tk,`khach_hang` kh WHERE TaiKhoan = '$TaiKhoan' AND Password = '$Password' AND tk.Ma_KH = kh.Ma_KH";
$result = mysqli_query($conn , $sql);


if(mysqli_num_rows($result) == 1)
    {
        
        $row = mysqli_fetch_assoc($result);
        $thu['Status'] = 3; 
        $thu['Mess'] = "Đăng nhập thành công";  
        $thu['Ten'] = $row['Ten_KH']; 
        $thu['TaiKhoan'] =$row['TaiKhoan']; 
        $thu['Token'] = "khaibe";         
    
        echo json_encode($thu);
        //base64_decode($thu);
        //print_r($thu);
    }
else
    {
        $thu['Status'] = 2;
        $thu['Mess'] = "Đăng nhập thất bại";
        $thu['TaiKhoan'] = $TaiKhoan;
        $thu['Password'] = $Password;
        echo json_encode($thu);
    }
?>