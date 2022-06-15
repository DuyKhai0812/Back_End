<?php
require '../Connect.php';
$Ma_DH = $_GET['Ma_DH'];
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT Ma_DH,Ten_SP,dh.Ma_SP,Hinh,Don_Gia,Ma_LSP,Giam_Gia,Ma_NSX,So_Luong,Thanh_Tien FROM `ct_don_hang` dh,`san_pham` sp WHERE `Ma_DH` = '$Ma_DH' and dh.Ma_SP = sp.Ma_SP";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_DH'] = $row['Ma_DH'];
        $thu[$cr]['Ten_SP'] = $row['Ten_SP'];    
        $thu[$cr]['Ma_SP'] = $row['Ma_SP'];
        $thu[$cr]['Hinh'] = $row['Hinh'];
        $thu[$cr]['Gia'] = $row['Don_Gia'];
        $thu[$cr]['Don_Gia'] = ($row['Don_Gia'] * $row['Giam_Gia'] / 100);
        $thu[$cr]['Ma_LSP'] = $row['Ma_LSP'];
        $thu[$cr]['Ma_NSX'] = $row['Ma_NSX'];
        $thu[$cr]['So_Luong'] = $row['So_Luong'];
        $thu[$cr]['Thanh_Tien'] = $row['Thanh_Tien'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_DH'] = $row['Ma_DH'];
        $thu[$cr]['Ten_SP'] = $row['Ten_SP'];    
        $thu[$cr]['Ma_SP'] = $row['Ma_SP'];
        $thu[$cr]['Hinh'] = $row['Hinh'];
        $thu[$cr]['Gia'] = $row['Don_Gia'];
        $thu[$cr]['Don_Gia'] = $row['Don_Gia'] - ($row['Don_Gia'] * $row['Giam_Gia'] / 100);
        $thu[$cr]['Ma_LSP'] = $row['Ma_LSP'];
        $thu[$cr]['Ma_NSX'] = $row['Ma_NSX'];
        $thu[$cr]['So_Luong'] = $row['So_Luong'];
        $thu[$cr]['Thanh_Tien'] = $row['Thanh_Tien'];
        $cr++;
    }
    echo json_encode($thu);
}
?>