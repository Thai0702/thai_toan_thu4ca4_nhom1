<?php
include('../../config/config.php');
// Nạp file cấu hình, có thể chứa thông tin về kết nối cơ sở dữ liệu và các thiết lập khác

$namecategory = $_POST['namecategory'];
// Lấy giá trị của biến 'namecategory' từ dữ liệu được gửi đi bằng phương thức POST

// Kiểm tra nếu tên danh mục đã tồn tại
$sql_check = "SELECT id_category FROM tbl_category WHERE namecategory = '".$namecategory."'";
$result_check = mysqli_query($mysqli, $sql_check);
// Thực hiện truy vấn SQL để kiểm tra xem 'namecategory' đã tồn tại trong cơ sở dữ liệu hay chưa

if (mysqli_num_rows($result_check) > 0) {
    // Nếu tồn tại, chuyển hướng về trang quản lý danh mục và thêm tham số 'query=duplicate'

    header('Location:../../index.php?action=quanlidanhmucsanpham&query=duplicate');
 exit();
}

if (isset($_POST['addcategory'])) {
    // Nếu biến 'addcategory' được đặt, thực hiện thêm mới danh mục vào cơ sở dữ liệu
    $sql_them = "INSERT INTO tbl_category(namecategory) VALUE('".$namecategory."')";
    mysqli_query($mysqli, $sql_them);
    // Thực hiện truy vấn SQL để thêm mới danh mục

    // Chuyển hướng về trang quản lý danh mục với tham số 'query=add'
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();
} elseif (isset($_POST['editcategory'])) {
    // Nếu biến 'editcategory' được đặt, thực hiện cập nhật thông tin danh mục trong cơ sở dữ liệu
    $sql_them = "UPDATE tbl_category SET namecategory='".$namecategory."' WHERE id_category='$_GET[idcategory]'";
    mysqli_query($mysqli, $sql_them);
    // Thực hiện truy vấn SQL để cập nhật thông tin danh mục

    // Chuyển hướng về trang quản lý danh mục với tham số 'query=add'
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();
} elseif (isset($_GET['idcategory'])) {
    // Nếu biến 'idcategory' được đặt trong URL
    $id = $_GET['idcategory'];

    // Kiểm tra xem có sản phẩm thuộc danh mục này không
    $sql_check_products = "SELECT COUNT(*) AS product_count FROM tbl_product WHERE id_category = '".$id."'";
    $result_check_products = mysqli_query($mysqli, $sql_check_products);
    $row_check_products = mysqli_fetch_assoc($result_check_products);

    if ($row_check_products['product_count'] > 0) {
        // Nếu có sản phẩm thuộc danh mục, không thực hiện xóa
        $message= "danh mục đã có sản phẩm";
        header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
       exit();
     
    }

    // Nếu không có sản phẩm thuộc danh mục, thực hiện xóa danh mục
    $sql_xoa = "DELETE FROM tbl_category WHERE id_category = '".$id."'";
    mysqli_query($mysqli, $sql_xoa);

    // Chuyển hướng về trang quản lý danh mục với tham số 'query=add'
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();
}

?>
<script>
    // PHP variable to JavaScript variable
    var message = "<?php echo $message; ?>";
    
    // Kiểm tra xem message có giá trị không và hiển thị alert
    if (message) {
        alert(message);
      
    }
</script>