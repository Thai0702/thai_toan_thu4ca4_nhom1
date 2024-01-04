<?php
include('../../config/config.php');
// Nạp file cấu hình, có thể chứa thông tin về kết nối cơ sở dữ liệu và các thiết lập khác
session_start();

$message = ""; // Khởi tạo biến chứa thông báo

if (isset($_POST['addproduct'])) {
    // Nếu nút 'Thêm sản phẩm' được nhấn
    $nameproduct = $_POST['nameproduct'];
    $productcode = $_POST['productcode'];

    // Kiểm tra xem mã sản phẩm đã tồn tại chưa
    $check_duplicate_sql = "SELECT COUNT(*) as count FROM tbl_product WHERE productcode = '".$productcode."'";
    $result = mysqli_query($mysqli, $check_duplicate_sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Nếu mã sản phẩm đã tồn tại, thiết lập thông báo lỗi
        $message = "Trùng mã sản phẩm.";
    } else {
        // Ngược lại, tiếp tục lấy các thông tin khác và thêm mới sản phẩm vào cơ sở dữ liệu
        $quantity = $_POST['quantity'];
        $priceproduct = $_POST['priceproduct'];
        $summary = $_POST['summary'];
        $content = $_POST['content'];
        $picture = $_FILES['pictureproduct']['name'];
        $picture_tmp = $_FILES['pictureproduct']['tmp_name'];
        $picture = time().'_'.$picture;
        $status = $_POST['status'];
        $category = $_POST['category'];

        // Thực hiện truy vấn để thêm mới sản phẩm
        $sql_edit = "INSERT INTO tbl_product(nameproduct,productcode,priceproduct,quantity,content,summary,picture,
        status,id_category) VALUE('".$nameproduct."','".$productcode."','".$priceproduct."','".$quantity."','".$content."','".$summary."',
        '".$picture."','".$status."','".$category."')";
        
        // Thực hiện truy vấn
        mysqli_query($mysqli, $sql_edit);
        
        // Di chuyển file hình ảnh đến thư mục upload
        move_uploaded_file($picture_tmp, 'upload/'.$picture);

        // Chuyển hướng về trang quản lý sản phẩm với tham số 'query=add'
        header('Location:../../index.php?action=quanlisanpham&query=add');
    }
} elseif (isset($_POST['editproduct'])) {
    // Nếu nút 'Sửa sản phẩm' được nhấn
    // Lấy thông tin từ form
    $nameproduct = $_POST['nameproduct'];
    $productcode = $_POST['productcode'];
    $quantity = $_POST['quantity'];
    $priceproduct = $_POST['priceproduct'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $picture = $_FILES['pictureproduct']['name'];
    $picture_tmp = $_FILES['pictureproduct']['tmp_name'];
    $picture = time().'_'.$picture;
    $status = $_POST['status'];
    $category = $_POST['category'];

    // Nếu có file hình ảnh được chọn, xóa hình ảnh cũ
    if ($picture != '') {
        $id = $_GET['idproduct'];
        $sql = "SELECT * FROM tbl_product WHERE id_product = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('upload/' . $row['picture']);
        }

        // Di chuyển file hình ảnh mới đến thư mục upload
        move_uploaded_file($picture_tmp, 'upload/'.$picture);
        
        // Thực hiện truy vấn để cập nhật sản phẩm
        $sql_edit = "UPDATE tbl_product SET nameproduct='".$nameproduct."', productcode='".$productcode."' , quantity='".$quantity."',
        priceproduct='".$priceproduct."', summary='".$summary."', content='".$content."', picture='".$picture."', status='".$status."',
        id_category='".$category."' WHERE id_product='$_GET[idproduct]'";
    } else {
        // Nếu không có file hình ảnh mới được chọn, thực hiện truy vấn cập nhật không bao gồm hình ảnh
        $sql_edit = "UPDATE tbl_product SET nameproduct='".$nameproduct."', productcode='".$productcode."' , quantity='".$quantity."',
        priceproduct='".$priceproduct."', summary='".$summary."', content='".$content."',  status='".$status."', category='".$category."'
        WHERE id_product='$_GET[idproduct]'";
    }
    
    // Thực hiện truy vấn
    mysqli_query($mysqli, $sql_edit);
    
    // Chuyển hướng về trang quản lý sản phẩm với tham số 'query=add'
    header('Location:../../index.php?action=quanlisanpham&query=add');
} elseif (isset($_GET['idproduct'])) {
    // Nếu có tham số idproduct trong URL, thực hiện xóa sản phẩm
    $id = $_GET['idproduct'];
    
    // Lấy thông tin về hình ảnh sản phẩm và xóa hình ảnh đó
    $sql = "SELECT * FROM tbl_product WHERE id_product = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('upload/' . $row['picture']);
    }
    
    // Thực hiện truy vấn để xóa sản phẩm
    $sql_delete = "DELETE FROM tbl_product WHERE id_product = '".$id."'";
    mysqli_query($mysqli, $sql_delete);
    
    // Chuyển hướng về trang quản lý sản phẩm với tham số 'query=add'
    header("Location:../../index.php?action=quanlisanpham&query=add");
}
?>
<!-- Chuyển biến PHP sang biến JavaScript -->
<script>
    var message = "<?php echo $message; ?>"; // Chuyển biến PHP sang JavaScript
    
    if (message) {
        // Nếu có thông báo lỗi, hiển thị cảnh báo và chuyển hướng về trang chính
        alert(message);
        window.location.href = '../../index.php';
    }
</script>
