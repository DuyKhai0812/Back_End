<?php
require '../Connect.php';

$SDT = $_GET['SDT'];
$Ma_KH = $_GET['Ma_KH'];

$sql = "UPDATE `khach_hang` SET `SDT`='$SDT' WHERE `Ma_KH`='$Ma_KH'";
$sql_check = "SELECT * FROM `khach_hang` WHERE SDT = '$SDT' AND Ma_KH != '$Ma_KH'";
$result_check = mysqli_query($conn,$sql_check);

if($result_check)
{
    if(mysqli_num_rows($result_check) == 0)
    {
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công sửa số điện thoại';
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
        $asd['message'] = 'Số điện thoại đã tồn tại';
        $asd['bug'] = mysqli_error($conn);
        echo json_encode($asd);
    }
}
else
{
    $asd['status'] = false;
    $asd['message'] = 'Không kết nối được database';
    $asd['bug'] = mysqli_error($conn);
    echo json_encode($asd);
}

?>