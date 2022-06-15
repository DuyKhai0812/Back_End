<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `san_pham` WHERE 1";
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
        $thu[$cr]['Don_Gia'] = $row['Don_Gia'];
        $thu[$cr]['Mo_Ta'] = $row['Mo_Ta'];
        $thu[$cr]['Ma_NSX'] = $row['Ma_NSX'];
        $thu[$cr]['Ma_LSP'] = $row['Ma_LSP'];
        $thu[$cr]['Giam_Gia'] = $row['Giam_Gia'];
        $thu[$cr]['Gia'] = $row['Don_Gia'] - ($row['Don_Gia'] * ($row['Giam_Gia'] / 100));
        $thu[$cr]['Kich_Hoat'] = $row['Kich_Hoat'];
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>