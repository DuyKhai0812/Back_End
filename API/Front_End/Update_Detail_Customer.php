<?php

require_once './Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_KH = $_POST['Ma_KH'];
$Ten_KH = $_POST['Ten_KH'];
$Ngay_Sinh = $_POST['Ngay_Sinh'];
$Gioi_Tinh = $_POST['Gioi_Tinh'];
$Dia_Chi = $_POST['Dia_Chi'];
$SDT = $_POST['SDT'];

$error;
if(empty($Ma_KH))
{
    $error = "Không có mã khách hàng";
    echo json_encode($error);
}
else if(empty($Ten_KH))
{
    $error = "Bạn chưa nhập tên khách hàng";
    echo json_encode($error);
}
else
{
    $queryNSX = mysqli_query($conn,"SELECT * FROM `khach_hang` WHERE SDT = '$SDT'");
    if(mysqli_num_rows($queryNSX) == 0)
    {
        $queryInsert = "UPDATE `khach_hang` SET `Ten_KH`='$Ten_KH',`Ngay_Sinh`='$Ngay_Sinh',`Gioi_Tinh`='$Gioi_Tinh',`Dia_Chi`='$Dia_Chi',`SDT`='$SDT' WHERE `Ma_KH`='$Ma_KH'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công cập nhật thông tin khách hàng';
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
        $error['message'] = "Số điện thoại bị trùng";
        echo json_encode($error);
    }
    
}
?>