<?php
include_once "lib_admin/database.php";
$error = false;
?>
<?php if(isset($_GET['id'])){
    $result=mysqli_query($db,"DELETE FROM images_product WHERE `id`=".$_GET['id']);
    if (!$result) {
        $error = "Không thể xóa ảnh trong thư viện.";
    }
    mysqli_close($db);
    if ($error !== false) {
        ?>
        <div id="error-notify" class="box-content">
            <h2>Thông báo</h2>
            <h4><?= $error ?></h4>
            <a href="javascript:window.history.go(-1)">Quay lại</a>
        </div>
    <?php } else { ?>
        <div id="success-notify" class="box-content">
            <h2>Xóa thư viện ảnh của sản phẩm thành công</h2>
            <a href="javascript:window.history.go(-1)">Quay lại</a>
        </div>
    <?php } ?>
<?php } ?>
</div>
</div>

