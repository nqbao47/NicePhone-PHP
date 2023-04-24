
<?php
  $sql_sua_danhmuc = "SELECT * FROM tbl_danhmuc where id_danhmuc='$_GET[iddanhmuc]' LIMIT 1 ";
  $query_sua_danhmuc = mysqli_query($mysqli, $sql_sua_danhmuc);
  ?>
<p>Sửa danh mục sp</p>
<table border="1" width="50%" style="border-collapse: collapse">
<form action="tongthe/danhmuc/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?> " method="POST">
    <?php 
        while ($dong = mysqli_fetch_array($query_sua_danhmuc)) {
            ?>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" value="<?php echo $dong['ten_danhmuc'] ?>" name="ten_danhmuc"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" value="<?php echo $dong['sothutu'] ?>" name="sothutu"></td>
    </tr>
    <tr >
        <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
    </tr>
    <?php
        }?>
</form>
</table>