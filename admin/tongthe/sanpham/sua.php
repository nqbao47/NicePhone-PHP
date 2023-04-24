
<?php
  $sql_sua_sanpham = "SELECT * FROM tbl_sanpham where id_sanpham='$_GET[idsanpham]' LIMIT 1 ";
  $query_sua_sanpham = mysqli_query($mysqli, $sql_sua_sanpham);
  ?>

<p>SỬA SẢN PHẨM</p>
<table  width="50%" border="1" style="border-collapse: collapse" >
<?php 
    while($row = mysqli_fetch_array($query_sua_sanpham)) {
?>
<form action="tongthe/sanpham/xuly.php?idsanpham=<?php echo $_GET['idsanpham']?>"
                method="POST" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" value="<?php echo $row['ten_sanpham'] ?>" name="tensp"></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" value="<?php echo $row['ma_sanpham'] ?>" name="masp"></td>
    </tr>
    <tr>
        <td>Giá sản phẩm</td>
        <td><input type="text" value="<?php echo $row['gia_sanpham'] ?>" name="giasp"></td>
    </tr>
    <tr>
        <td>Số lượng sản phẩm</td>
        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh">
            <img src="tongthe/sanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px" >
        </td>

    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea name="tomtat" id="" cols="30" rows="10" style="resize: none;"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung" id="" cols="30" rows="10" style="resize: none";><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
        <td>Danh mục</td>
        <td>
            <select name="danhmuc" id="">
                <?php 
                    $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>
                <?php
                    }
                   else{
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>
                <?php
                    }
                }
                    ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Trạng thái</td>
        <td>
            <select name="trangthai" id="">
                <?php 
                    if ($row['trangthai == 1']) {
                        ?>
                <option value="1" selected>Hiện sản phẩm</option>
                <option value="2">Ẩn sản phẩm</option>
                <?php
                    }
                    else{
                        ?>
                <option value="1">Hiện sản phẩm</option>
                <option value="2" selected>Ẩn sản phẩm</option>
                <?php
                    }
                ?>
            </select>
        </td>
    </tr>
    <tr >
        <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
    </tr>
</form>
<?php 
    }
?>
</table>