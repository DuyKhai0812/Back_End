<?php

require_once './Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_KH = $_POST['Ma_KH'];
$Ma_SP = $_POST['Ma_SP'];
$SL = $_POST['So_Luong'];

$error;
if(empty($Ma_KH))
{
    $error = "Error missing id";
    echo json_encode($error);
}
else if(empty($Ma_SP))
{
    $error = "Error mssing id product";
    echo json_encode($error);
}
else
{
    $queryCheck = mysqli_query($conn,"SELECT * FROM `gio_hang` WHERE Ma_KH = '$Ma_KH' AND Ma_SP = '$Ma_SP'");
    if(mysqli_num_rows($queryCheck) == 0)
    {
        $queryInsert = "INSERT INTO `gio_hang`(`ID`, `Ma_KH`, `Ma_SP`, `So_Luong`, `Thanh_Tien`) 
        VALUES ('','$Ma_KH','$Ma_SP',$SL,$SL * (SELECT Don_Gia - (Don_Gia * Giam_Gia)/100 FROM san_pham WHERE Ma_SP = '$Ma_SP'))";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công thêm vào giỏ hàng';
            echo json_encode($asd);
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại 1';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }
    }
    else
    {
        $queryInsert = "CALL `Up_SL_SP`('$Ma_KH', '$Ma_SP',$SL);";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công thêm vào giỏ hàng';
            echo json_encode($asd);
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại 2';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }
    }
    
}
?>