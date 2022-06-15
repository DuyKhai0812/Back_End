<?php
require 'Connect.php';
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT sp.Ma_LSP,Ten_LSP,SUM(Thanh_Tien) as Total_Type FROM ct_don_hang dh,san_pham sp,loai_sp lsp,don_hang dh2
WHERE dh.Ma_SP = sp.Ma_SP AND sp.Ma_LSP = lsp.Ma_LSP AND Trang_Thai = 1 AND dh2.Ma_DH = dh.Ma_DH GROUP BY Ma_LSP,Ten_LSP";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu[$cr]['Ma_LSP'] = $row['Ma_LSP'];
        $thu[$cr]['name'] = $row['Ten_LSP'];
        $thu[$cr]['value'] = $row['Total_Type'];    
        $cr++;
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>