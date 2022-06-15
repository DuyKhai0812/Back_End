<?php
require '../Connect.php';

$thu = [];
$MA_LSP = $_GET['Ma_LSP'];
//Lệnh thực thi sql
$sql = "CALL `Show_product_type`('$MA_LSP');";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_SP'] = $row['Ma_SP'];
        $thu[$cr]['Ten_SP'] = $row['Ten_SP'];
        $thu[$cr]['Hinh'] = $row['Hinh'];
        $thu[$cr]['Mo_Ta'] = $row['Mo_Ta'];
        $thu[$cr]['Don_Gia'] = $row['Don_Gia'];
        $thu[$cr]['Ten_LSP'] = $row['Ten_LSP'];
        $thu[$cr]['Ten_NSX'] = $row['Ten_NSX'];
        $thu[$cr]['Giam_Gia'] = $row['Giam_Gia'];
        $thu[$cr]['Thanh_Tien'] = $row['Thanh_Tien'];
        $cr++;
    }
    echo json_encode($thu);
}
else if($result->num_rows == 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_SP'] = $row['Ma_SP'];
        $thu[$cr]['Ten_SP'] = $row['Ten_SP'];
        $thu[$cr]['Hinh'] = $row['Hinh'];
        $thu[$cr]['Mo_Ta'] = $row['Mo_Ta'];
        $thu[$cr]['Don_Gia'] = $row['Don_Gia'];
        $thu[$cr]['Ten_LSP'] = $row['Ten_LSP'];
        $thu[$cr]['Ten_NSX'] = $row['Ten_NSX'];
        $thu[$cr]['Giam_Gia'] = $row['Giam_Gia'];
        $thu[$cr]['Thanh_Tien'] = $row['Thanh_Tien'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>
