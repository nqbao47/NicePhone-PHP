<p class="lietkesanpham">-- TẤT CẢ SẢN PHẨM --</p>

<?php
  $sql_lietke_sanpham = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
  $query_lietke_sanpham = mysqli_query($mysqli, $sql_lietke_sanpham);
  ?>

<table border="1" width="100%" style="border-collapse: collapse">
    <tr>
        <th>ID</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Danh mục</th>
        <th>Số lượng</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    <?php  
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_sanpham)) {
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td> <img src="tongthe/sanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px" > </td>
        <td><?php echo $row['ten_sanpham'] ?></td>
        <td><?php echo $row['ma_sanpham'] ?></td>
        <td><?php echo number_format($row['gia_sanpham'], 0,',', '.').' VNĐ' ?></td>
        <td><?php echo $row['ten_danhmuc'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php if($row['trangthai'] == 1){
            echo 'Hiển thị';     
        }
        else{
            echo 'Ẩn';
        } 
        ?></td>

        <td>
            <a href="tongthe/sanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a>|
            <a href="?action=sanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>" >Sửa</a>  
            
        </td>
    </tr>
    <?php
        }
    ?>

</table>