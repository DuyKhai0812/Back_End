<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_LSP = $_POST['Ma_LSP'];
$Ten_LSP = $_POST['Ten_LSP'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;
if(empty($Ma_LSP))
{
    $error = "Bạn chưa nhập mã loai sản phẩm";
    echo json_encode($error);
}
else if(empty($Ten_LSP))
{
    $error = "Bạn chưa nhập mã sản phẩm";
    echo json_encode($error);
}
else
{
    $queryLSP = mysqli_query($conn,"SELECT * FROM `loai_sp` WHERE Ma_LSP = '$Ma_LSP'");
    if(mysqli_num_rows($queryLSP) == 0)
    {
        $queryInsert = "INSERT INTO `loai_sp`(`Ma_LSP`, `Ten_LSP`) VALUES ('$Ma_LSP','$Ten_LSP')";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công thêm loại sản phẩm';
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Thêm loại sản phẩm $Ma_LSP','$Account','$date')");
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
        $error['message'] = "Mã loại sản phẩm bị trùng";
        echo json_encode($error);
    }
    
}
?>