<?php
require 'Connect.php';
$Ma_LSP = $_GET['Ma_LSP'];
$thu = [];

//Lệnh thực thi sql
$sql = "SELECT * FROM `loai_sp` WHERE Ma_LSP = '$Ma_LSP'";
$result = $conn->query($sql);
//Show API
if($result->num_rows > 0)
{
    $cr = 0;
    while($row = $result->fetch_assoc())
    {
        $thu['Ma_LSP'] = $row['Ma_LSP'];
        $thu['Ten_LSP'] = $row['Ten_LSP'];    
    }
    echo json_encode($thu);
}
else
{
    http_response_code(404);
}
?>