<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_SP = $_POST['Ma_SP'];
$Ten_SP  = $_POST['Ten_SP'];
$Hinh  = $_POST['Hinh'];
$Don_Gia  = $_POST['Don_Gia'];
$Mo_Ta  = $_POST['Mo_Ta'];
$Ma_NSX   = $_POST['Ma_NSX'];
$Ma_LSP  = $_POST['Ma_LSP'];
$Giam_Gia  = $_POST['Giam_Gia'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

        $queryInsert = "UPDATE `san_pham` SET `Ten_SP`='$Ten_SP',`Hinh`='$Hinh',`Don_Gia`='$Don_Gia',`Mo_Ta`='$Mo_Ta',
        `Ma_NSX`='$Ma_NSX',`Ma_LSP`='$Ma_LSP',`Giam_Gia`='$Giam_Gia' WHERE `Ma_SP` = '$Ma_SP'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công sửa sản phẩm';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Sửa sản phẩm $Ten_SP','$Account','$date')");
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>