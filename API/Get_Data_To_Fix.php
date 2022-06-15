<?php
require 'Connect.php';
$thu = [];
$Ma_SP = $_GET['Ma_SP'];
//Lệnh thực thi sql
$sql = "SELECT * FROM `san_pham` WHERE Ma_SP = '$Ma_SP'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu['Ma_SP'] = $row['Ma_SP'];
        $thu['Ten_SP'] = $row['Ten_SP'];    
        $thu['Hinh'] = $row['Hinh'];
        $thu['Don_Gia'] = $row['Don_Gia'];
        $thu['Mo_Ta'] = $row['Mo_Ta'];
        $thu['Ma_NSX'] = $row['Ma_NSX'];
        $thu['Ma_LSP'] = $row['Ma_LSP'];
        $thu['Giam_Gia'] = $row['Giam_Gia'];
        $thu['Kich_Hoat'] = $row['Kich_Hoat'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>