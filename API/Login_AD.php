<?php
require_once "Connect.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ERROR);
$account = $_POST['account'];
$password = $_POST['password'];
$pass = md5($password);
$thu = [];
$sql="SELECT * FROM `admin-login` WHERE Account = '$account' AND Password = '$pass'";
$result = mysqli_query($conn , $sql);


if(mysqli_num_rows($result) == 1)
    {
        
        $row = mysqli_fetch_assoc($result);
        $thu['Status'] = 3; 
        $thu['Mess'] = "Đăng nhập thành công";  
        $thu['Ten'] = $row['Name']; 
        $thu['TaiKhoan'] =$row['Account']; 
        //$thu['Password'] =base64_encode($row['Password']);  
        $thu['Token'] = "khaibe";      
        $thu['Quyen'] = $row['Ma_Loai_TK'];
    
        echo json_encode($thu);
        //base64_decode($thu);
        //print_r($thu);
    }
else
    {
        $thu['Status'] = 2;
        $thu['Mess'] = "Đăng nhập thất bại";
        $thu['Account'] = $account;
        $thu['Password'] = $password;
        echo json_encode($thu);
    }
?>