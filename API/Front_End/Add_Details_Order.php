<?php
require_once "./Connect.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ERROR);

$Ma_DH = $_POST['Ma_DH'];
$Ma_SP = $_POST['Ma_SP'];
$SL = $_POST['SL'];


$sql_qr = "CALL `add-details-odres`('$Ma_DH','$Ma_SP',$SL);";
$result2 = mysqli_query($conn,$sql_qr);
    if($result2)
    {
        $asd['status'] = true;
        $asd['message'] = 'Thành công thêm sản phẩm vào đơn hàng';
        echo json_encode($asd);
        $result3 = mysqli_query($conn,"CALL `update_fix`('$Ma_DH');");
    }
    else
    {
        $asd['status'] = false;
        $asd['message'] = 'Không thêm được sản phẩm ';
        $asd['bug'] = mysqli_error($conn);
        echo json_encode($asd);
    }

    

?>