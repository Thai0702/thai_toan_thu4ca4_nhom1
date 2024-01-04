<?php
$sql_lietke_kh = "SELECT * FROM tbl_admin where role=0";
$query_lietke_kh =  mysqli_query($mysqli, $sql_lietke_kh);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 1200px;
            margin: 0 auto;
            /* Để căn giữa trang web */
        }

        .section-header {
            color: #12A6DC;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /* Để tạo khoảng cách giữa các phần tử */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table,
        .custom-table th,
        .custom-table td {
            border: 1px solid #12A6DC;
        }

        .custom-table th,
        .custom-table td {
            padding: 10px;
            text-align: left;
        }

        .custom-table th {
            background-color: #12A6DC;
            color: #fff;
        }

        .custom-table img {
            max-width: 100%;
            /* Để đảm bảo hình ảnh không bị tràn ra khỏi ô */
            height: auto;
            /* Để giữ tỷ lệ khung hình ảnh */
        }

        .list-table a {
            color: #12A6DC;
            text-decoration: none;
        }

        .list-table a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Hiển thị khách hàng</title>
</head>

<body>

    <div class="container">

        <h3 class="section-header">Hiển thị khách hàng</h3>

        <table class="custom-table list-table" border="1">
            <form method="POST" action="module/quanliuser/xuly.php">
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>User</th>
                    <th>Thao Tác</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($query_lietke_kh)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td>
                        <a href="module/quanliuser/xuly.php?iduser=<?php echo $row['id_user'] ?>">Xóa</a> 

                        </td>
                    </tr>
                <?php
                }
                ?>
            </form>
        </table>

    </div>

</body>

</html>