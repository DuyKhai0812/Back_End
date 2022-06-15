<?php

require_once 'Connect.php';
header("Content-Type: application/json; charset=UTF-8");
$KichHoat = $_POST['KichHoat'];
$Ma_SP = $_POST['Ma_SP'];
$Account = $_POST['Account'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d h:i:s',time());

$error;

        $queryInsert = "UPDATE `san_pham` SET `Kich_Hoat`='$KichHoat' WHERE `Ma_SP` = '$Ma_SP'";
        $result = mysqli_query($conn,$queryInsert);
        if($result)
        {
            $asd['status'] = true;
            $asd['message'] = 'Thành công kích hoạt';
            echo json_encode($asd);
            if($KichHoat == 1)
                $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Kích hoạt sản phẩm $Ma_SP','$Account','$date')");
            else
                $queryInsertNotice = mysqli_query($conn,"INSERT INTO `notice`(`ID`, `Noi_Dung`, `Account`, `Ngay`) VALUES ('','Vô hiệu hóa sản phẩm $Ma_SP','$Account','$date')");
        }
        else
        {
            $asd['status'] = false;
            $asd['message'] = 'Thất bại';
            $asd['bug'] = mysqli_error($conn);
            echo json_encode($asd);
        }

    

?>