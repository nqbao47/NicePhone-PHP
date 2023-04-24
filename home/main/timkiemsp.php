<?php
    if(isset($_POST['timkiem'])) {
        $key = $_POST['key'];
    }
    $sql_product = "SELECT * FROM tbl_sanpham, tbl_danhmuc  
                WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.ten_sanpham
                LIKE '%".$key."%' ";
    $query_product = mysqli_query($mysqli, $sql_product);
?>

<h3 class="tukhoa">Từ khoá : <a style="color:red"><?php echo $_POST['key'];  ?> </a> </h3>
                <ul class="list_product"> 
                        <?php 
                            while ($row =mysqli_fetch_array($query_product)) {
                        ?>
                        <li>
                            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img src="admin/tongthe/sanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="">
                            <p class="name_product"><?php echo $row['ten_sanpham'] ?></p>
                            <p class="price_product"> <?php echo number_format( $row['gia_sanpham'],0,',','.').' VND' ?></p>
                            <p style="text-align: center" class="danhmuc_product"><?php echo $row['ten_danhmuc'] ?></p>
                            </a>
                        </li>
                        <?php
                            } 
                        ?>
                    </ul>
                