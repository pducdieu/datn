<link rel="stylesheet" type="text/css" href="css/admin_style.css">
<script src="resources/ckeditor/ckeditor.js"></script>
<style>
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    table td {
        padding: 10px;
        vertical-align: top;
    }

    label {
        font-weight: bold;
        display: block;
    }

    input[type="text"], input[type="file"], select, textarea {
        width: calc(100% - 20px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .cancel-button {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .cancel-button:hover {
        background-color: #d32f2f;
    }

    img {
        max-height: 100px;
        margin-bottom: 10px;
    }

    .main-content {
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .error {
        color: red;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>
<?php
include 'connect_db.php';
include 'function.php';
?>
<div class="main-content">
    <h1><?= !empty($_GET['id']) ? "Sửa producer" : "Thêm producer" ?></h1>
    <div id="content-box">
        <?php
        $sql = "SELECT * FROM `menu_product` ORDER BY id ASC";
        $menu = mysqli_query($con, $sql);
        $menu_pro = mysqli_fetch_all($menu, MYSQLI_ASSOC);

        if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
            if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['address']) && !empty($_POST['address'])) {
                if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $uploadedFiles = $_FILES['image'];
                    $result = uploadFiles($uploadedFiles);
                    if (!empty($result['errors'])) {
                        $error = $result['errors'];
                    } else {
                        $image = $result['path'];
                    }
                }
                if (!isset($image) && !empty($_POST['image'])) {
                    $image = $_POST['image'];
                }
                if (!isset($error)) {
                    if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { // Cập nhật producer
                        $result = mysqli_query($con, "UPDATE `producer` SET `menu_id` = '" . $_POST['menu_id'] . "', `name` = '" . $_POST['name'] . "', `address` = '" . $_POST['address'] . "', `image` = '" . $image . "', `description` = '" . $_POST['description'] . "', `isActive` = '" . $_POST['isActive'] . "' WHERE `producer`.`id` = " . $_GET['id']);
                    } else { // Thêm producer mới
                        $result = mysqli_query($con, "INSERT INTO `producer` (`menu_id`, `name`, `address`, `image`, `description`, `isActive`) VALUES ('" . $_POST['menu_id'] . "', '" . $_POST['name'] . "', '" . $_POST['address'] . "', '" . $image . "', '" . $_POST['description'] . "', '" . $_POST['isActive'] . "');");
                    }

                    if (!$result) {
                        $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                    } else {
                        $success = "Cập nhật thành công.";
                    }
                }
            } else {
                $error = "Bạn chưa nhập đầy đủ thông tin.";
            }
        ?>
            <div class="container">
                <div class="error"><?= isset($error) ? $error : $success ?></div>
                <a href="producer.php">Quay lại danh sách producer</a>
            </div>
        <?php
        } else {
            if (!empty($_GET['id'])) {
                $result = mysqli_query($con, "SELECT * FROM `producer` WHERE `id` = " . $_GET['id']);
                $producer = $result->fetch_assoc();
            }
        ?>
            <form id="producer-form" method="POST" action="<?= (!empty($producer)) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="name">Tên producer:</label></td>
                        <td><input type="text" name="name" id="name" value="<?= !empty($producer) ? $producer['name'] : "" ?>" required /></td>
                    </tr>
                    <tr>
                        <td><label for="address">Địa chỉ:</label></td>
                        <td><input type="text" name="address" id="address" value="<?= !empty($producer) ? $producer['address'] : "" ?>" required /></td>
                    </tr>
                    <tr>
                        <td><label for="image">Ảnh đại diện:</label></td>
                        <td>
                            <?php if (!empty($producer['image'])) { ?>
                                <img src="../<?= $producer['image'] ?>" alt="Producer Image" /><br />
                                <input type="hidden" name="image" value="<?= $producer['image'] ?>" />
                            <?php } ?>
                            <input type="file" name="image" id="image" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Mô tả:</label></td>
                        <td><textarea name="description" id="description"><?= !empty($producer) ? $producer['description'] : "" ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="isActive">Trạng thái:</label></td>
                        <td><textarea name="isActive" id="isActive"><?= !empty($producer) ? $producer['isActive'] : "" ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="menu_id">Danh mục:</label></td>
                        <td>
                            <select name="menu_id" id="menu_id" class="danhmuc">
                                <?php foreach ($menu_pro as $menu) { ?>
                                    <option value="<?= $menu['id'] ?>" <?= !empty($producer) && $producer['menu_id'] == $menu['id'] ? "selected" : "" ?>><?= $menu['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit">Lưu</button>
                            <input type="button" value="Hủy" class="cancel-button" onclick="window.location.href='producer.php'">
                        </td>
                    </tr>
                </table>
            </form>
        <?php } ?>
    </div>
</div>
