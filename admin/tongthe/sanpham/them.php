<p class="themsanpham">-- THÊM SẢN PHẨM --</p>
<table border="2" width="100%" style="border-collapse: collapse">
<form action="tongthe/sanpham/xuly.php" method="POST" enctype="multipart/form-data">
    <tr>
        <td style="text-align: center; width: 100%; font-weight: bold;">Tên sản phẩm</td>
        <td><input style="width: 99%;" type="text" name="tensp"></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;" >Mã sản phẩm</td>
        <td><input style="width: 99%;" type="text" name="masp"></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Giá sản phẩm</td>
        <td><input style="width: 99%;"  type="text" name="giasp"></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Số lượng sản phẩm</td>
        <td><input style="width: 99%;"  type="text" name="soluong"></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Hình ảnh</td>
        <td><input style="width: 99%;"  type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Tóm tắt</td>
        <td><textarea name="tomtat" id="" cols="100%" rows="2" style="resize: none;"></textarea></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Nội dung</td>
        <td><textarea name="noidung" id="" cols="100%" rows="2" style="resize: none";></textarea></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Danh mục</td>
        <td>
            <select name="danhmuc" id="">
                <?php 
                    $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>
                <?php
                    }
                    ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">Trạng thái</td>
        <td>
            <select name="trangthai" id="">
                <option value="1">Hiện sản phẩm</option>
                <option value="2">Ẩn sản phẩm</option>
            </select>
        </td>
    </tr>
    <tr >
        <td class="themsp" colspan="2" style="width: 100%;" ><input style="width: 100%;font-weight: bold;"  type="submit" name="themsanpham" value="thêm sản phẩm"></td>
    </tr>
</form>
</table>