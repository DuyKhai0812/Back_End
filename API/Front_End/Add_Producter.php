<?php

require_once './Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_NSX = $_POST['Ma_NSX'];
$Ten_NSX = $_POST['Ten_NSX'];
$Do_Tin_Cay = $_POST['Do_Tin_Cay'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());


$error;
if(empty($Ma_NSX))
{
    $error = "Bạn chưa nhập mã loai sản phẩm";
    echo json_encode($error);
}
else if(empty($Ten_NSX))
{
    $error = "Bạn chưa nhập mã sản phẩm";
    echo json_encode($error);
}
else
{
    $queryNSX = mysqli_query($conn,"SELECT * FROM `nxs` WHERE Ma_NSX = '$Ma_NSX'");
    if(mysqli_num_rows($queryNSX) == 0)
    {
        $queryInsert = "INSERT INTO `nxs`(`Ma_NSX`, `Ten_NSX`, `Do_Tin_Cay`) VALUES ('$Ma_NSX','$Ten_NSX','$Do_Tin_Cay')";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công thêm nhà sản xuất';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Thêm nhà sản xuất $Ten_NSX','$Account','$date')");
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
        $error['message'] = "Mã loại sản phẩm bị trùng";
        echo json_encode($error);
    }
    
}
?>