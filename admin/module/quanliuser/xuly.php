<?php
// Kết nối đến cơ sở dữ liệu
include('../../config/config.php');

if (isset($_GET['iduser'])) {
    // Nếu có tham số idproduct trong URL, thực hiện xóa sản phẩm
    $id = $_GET['iduser'];
    
    // Lấy thông tin về hình ảnh sản phẩm và xóa hình ảnh đó
    $sql = "SELECT * FROM tbl_admin WHERE id_user = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
   
    
    // Thực hiện truy vấn để xóa sản phẩm
    $sql_delete = "DELETE FROM tbl_admin WHERE id_user = '".$id."'";
    mysqli_query($mysqli, $sql_delete);
    
    // Chuyển hướng về trang quản lý sản phẩm với tham số 'query=add'
    header("Location:../../index.php?action=quanliuser&query=add");
}
?>
