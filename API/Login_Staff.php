<?php
require_once "Connect.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ERROR);
$account = $_POST['account'];
$password = $_POST['password'];
$pass = md5($password);
$thu = [];
$sql="SELECT tk.Ma_NV,Ma_Loai_TK,KichHoat,Ten_NV FROM `tk_nv` tk,`nhan_vien` nv WHERE tk.Ma_NV = '$account' AND Password = '$pass' AND tk.Ma_NV = nv.Ma_NV";
$result = mysqli_query($conn , $sql);


if(mysqli_num_rows($result) == 1)
    {
        
        $row = mysqli_fetch_assoc($result);
        $thu['Status'] = 3; 
        $thu['Mess'] = "Đăng nhập thành công";  
        $thu['Ten'] = $row['Ten_NV']; 
        $thu['TaiKhoan'] =$row['Ma_NV']; 
        //$thu['Password'] =base64_encode($row['Password']);  
        $thu['Token'] = "khaibe";      
        $thu['Quyen'] = $row['Ma_Loai_TK'];
        $thu['KichHoat'] = $row['KichHoat'];
    
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
        $thu['MD5'] = $pass;
        echo json_encode($thu);
    }
?>