<?php
require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");

$Ma_NV  = $_POST['Ma_NV'];
$Ten_NV = $_POST['Ten_NV'];
$Ngay_Sinh = $_POST['Ngay_Sinh'];
$Gioi_Tinh = $_POST['Gioi_Tinh'];
$Dia_Chi = $_POST['Dia_Chi'];
$SDT  = $_POST['SDT'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

if(empty($Ma_NV))//Kiểm tra mã sản phẩm có rỗng hay ko
{
    $error['message'] = "Bạn chưa nhập mã nhân viên";
    echo json_encode($error);
}
else if(empty($Ten_NV))//Kiểm tra tên sản phẩm có rỗng hay ko
{
    $error['message'] = "Bạn chưa nhập tên nhân viên";
    echo json_encode($error);
}
else if(strlen($SDT) > 11)
{
    $error['message'] = "Số điện thoại dài hơn 10 số";
    echo json_encode($error);
}
else
{
    //Lệnh SQL cho đăng nhập
    $queryLSP = mysqli_query($conn,"SELECT * FROM `nhan_vien` WHERE Ma_NV = '$Ma_NV'");
    if(mysqli_num_rows($queryLSP) == 0)
    {
        $querySDT = mysqli_query($conn,"SELECT * FROM `nhan_vien` WHERE SDT = '$SDT'");
        if(mysqli_num_rows($querySDT) == 0)
        {
            $queryInsert = "INSERT INTO `nhan_vien`(`Ma_NV`, `Ten_NV`, `Ngay_Sinh`, `Gioi_Tinh`, `Dia_Chi`, `SDT`) 
            VALUES ('$Ma_NV','$Ten_NV','$Ngay_Sinh','$Gioi_Tinh','$Dia_Chi','$SDT')";
            $result = mysqli_query($conn,$queryInsert);
            if($result)
            {
                $asd['status'] = true;
                $asd['message'] = 'Thành công thêm nhân viên';
                $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Thêm nhân viên $Ma_NV','$Account','$date')");
            }
            else
            {
                $asd['status'] = false;
                $asd['message'] = 'Thất bại';
                $asd['bug'] = mysqli_error($conn);
            }
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Số điện thoại đã tồn tại';
        }
    }
    else
    {
        $asd['status'] = false;
        $asd['message'] = 'Mã nhân viên đã tồn tại';
    }
    echo json_encode($asd);
}
?>