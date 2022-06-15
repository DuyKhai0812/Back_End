<?php
require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");

$Ma_SP = $_POST['Ma_SP'];
$Ten_SP = $_POST['Ten_SP'];
$Hinh = $_POST['Hinh'];
$Don_Gia = $_POST['Don_Gia'];
$Mo_Ta = $_POST['Mo_Ta'];
$Ma_NSX = $_POST['Ma_NSX'];
$Ma_LSP = $_POST['Ma_LSP'];
$Giam_Gia = $_POST['Giam_Gia'];
$Kich_Hoat = $_POST['Kich_Hoat'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

if(empty($Ma_SP))//Kiểm tra mã sản phẩm có rỗng hay ko
{
    $error = "Bạn chưa nhập mã sản phẩm";
    echo json_encode($error);
}
else if(empty($Ten_SP))//Kiểm tra tên sản phẩm có rỗng hay ko
{
    $error = "Bạn chưa nhập tên sản phẩm";
    echo json_encode($error);
}
else
{
    //Lệnh SQL cho đăng nhập
    $queryLSP = mysqli_query($conn,"SELECT * FROM `san_pham` WHERE Ma_SP = '$Ma_SP'");
    if(mysqli_num_rows($queryLSP) == 0)
    {
        $queryInsert = "INSERT INTO `san_pham`(`ID`, `Ma_SP`, `Ten_SP`, `Hinh`, `Don_Gia`, `Mo_Ta`, `Ma_NSX`, `Ma_LSP`, `Giam_Gia`,`Kich_Hoat`) 
        VALUES ('','$Ma_SP','$Ten_SP','$Hinh','$Don_Gia','$Mo_Ta','$Ma_NSX','$Ma_LSP','$Giam_Gia','$Kich_Hoat')";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công thêm sản phẩm';
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Thêm sản phẩm $Ten_SP','$Account','$date')");
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
        $asd['message'] = 'Mã sản phẩm đã tồn tại';
    }
    echo json_encode($asd);
}
?>