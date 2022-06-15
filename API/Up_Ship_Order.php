<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_DH  = $_POST['Ma_DH'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

        $queryInsert = "CALL `Up_Ship`('$Ma_DH');";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công tiến tới bước tiếp theo';
            echo json_encode($asd);
            $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Kích hoạc thành công bước tiếp theo của đơn $Ma_DH','$Account','$date')");
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>