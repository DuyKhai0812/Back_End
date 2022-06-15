<?php

require_once './Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$TaiKhoan = $_POST['TaiKhoan'];
$Password = $_POST['Password'];

$error;
if(empty($Password))
{
    $error['message']= "Bạn chưa nhập mật khẩu";
    echo json_encode($error);
}
else if(empty($TaiKhoan))
{
    $error['message']= "Bạn chưa nhập tài khoản";
    echo json_encode($error);
}
else
{
    $queryNSX = mysqli_query($conn,"SELECT * FROM `tk_kh` WHERE TaiKhoan = '$TaiKhoan'");
    if(mysqli_num_rows($queryNSX) == 0)
    {
        $queryInsert = "INSERT INTO `tk_kh`(`Ma_KH`, `TaiKhoan`, `Password`, `Ma_Loai_TK`) VALUES ('$TaiKhoan','$TaiKhoan','$Password','2')";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $queryInsert2 = mysqli_query($conn,"INSERT INTO `khach_hang`(`Ma_KH`) VALUES ('$TaiKhoan')");
            if($queryInsert2)
            {
                $asd['status'] = true;
                $asd['message'] = 'Thành công thêm tài khoản khách hàng';
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
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }
    }
    else
    {
        $error['message']= "Tài khoản khách hàng đã tồn tại";
        echo json_encode($error);
    }    
    
    
}
?>