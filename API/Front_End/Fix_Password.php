<?php
require '../Connect.php';

$TaiKhoan = $_GET['TaiKhoan'];
$Password = $_GET['Password'];
$PasswordOld = $_GET['PasswordOld'];

$sql = "UPDATE `tk_kh` SET `Password`='$Password' WHERE `TaiKhoan`='$TaiKhoan'";
$sql_check = "SELECT * FROM tk_kh WHERE TaiKhoan = '$TaiKhoan ' AND Password = '$PasswordOld'";
$result_check = mysqli_query($conn,$sql_check);
if($result_check)
{
    if(mysqli_num_rows($result_check) == 1)
    {
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $asd['status1'] = true;
            $asd['message1'] = 'Thành công đổi mật khẩu';
            echo json_encode($asd);
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Lỗi không xác định';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }
    }
    else
    {
        $asd['status'] = false;
        $asd['message'] = 'Mật khẩu củ không đúng';
        $asd['bug'] = mysqli_error($conn);
        echo json_encode($asd);
    }
}
else
{
    $asd['status'] = false;
    $asd['message'] = 'Lỗi không xác định';
    $asd['bug'] = mysqli_error($conn);
    echo json_encode($asd);
}
    



?>