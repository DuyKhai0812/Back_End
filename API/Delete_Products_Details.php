<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$Ma_DH  = $_POST['Ma_DH'];
$Ma_SP  = $_POST['Ma_SP'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;
        
        
            $queryInsert = "DELETE FROM `ct_don_hang` WHERE Ma_DH = '$Ma_DH' AND Ma_SP = '$Ma_SP '";
            $result = mysqli_query($conn,$queryInsert);
            if($result)
            {
                
                $asd['status'] = true;
                $asd['message'] = 'Thành công tiến tới bước tiếp theo';
                echo json_encode($asd);
                $queryProc =  mysqli_query($conn,"CALL `update-total-money-delete`('$Ma_DH','$Ma_SP ');");
                $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Xóa sản phẩm $Ma_SP của đơn hàng $Ma_DH','$Account','$date')");
            }
            else
            {
                $asd['status'] = false;
                $asd['message'] = 'Thất bại';
                $asd['bug'] = mysqli_error($conn);
                echo json_encode($asd);
            }
        

    

?>