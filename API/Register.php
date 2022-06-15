<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_NV = $_POST['Ma_NV'];
$SDT = $_POST['SDT'];
$Password = $_POST['Password'];
$KichHoat = $_POST['KichHoat'];

$error;
if(empty($Password))
{
    $error['message']= "Bạn chưa nhập mật khẩu";
    echo json_encode($error);
}
else
{
        $pass = md5($Password);
        $queryInsert = "INSERT INTO `tk_nv`(`Ma_NV`, `SDT`, `Password`, `Ma_Loai_TK`, `KichHoat`) VALUES ('$Ma_NV','$SDT','$pass','1','$KichHoat')";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công thêm tài khoản nhân viên';
            echo json_encode($asd);
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }
    
    
}
?>