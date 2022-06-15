<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_LSP  = $_POST['Ma_LSP'];
$Ten_LSP  = $_POST['Ten_LSP'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

        $queryInsert = "UPDATE `loai_sp` SET `Ten_LSP`='$Ten_LSP' WHERE `Ma_LSP`='$Ma_LSP'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công sửa loại sản phẩm';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Sửa loại sản phẩm $Ma_LSP','$Account','$date')");
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>