<p>CHI TIẾT SẢN PHẨM</p>
<?php 
    $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
    AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
//    print_r($query_chitiet)      
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
 ?>
<div class="container_chitiet">
    <div class="hinhanhsp">
            <img width="100%" src="admin/tongthe/sanpham/uploads/<?php echo $row_chitiet['hinhanh'] ?> " alt="">
    </div>
    <form action="home/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
        <div class="chitietsp">
                <h3 style="margin: 0;">Tên sản phẩm: <?php echo $row_chitiet['ten_sanpham']?></h3>
                <p>Mã sản phẩm: <?php echo $row_chitiet['ma_sanpham']?></p>
                <p>Giá sản phẩm: <?php echo number_format( $row_chitiet['gia_sanpham'],0,',','.').' VND' ?></p>
                <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong']?></p>
                <p>Danh mục sản phẩm: <?php echo $row_chitiet['ten_danhmuc']?></p>
                <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
            </div>
    </form>
</div>
<?php
    } 
?> 