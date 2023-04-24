

<?php 
    $sql_product = "SELECT * FROM tbl_sanpham WHERE  tbl_sanpham.id_danhmuc='$_GET[id]'  ORDER BY id_sanpham DESC";
    $query_product = mysqli_query($mysqli, $sql_product);

    $sql_dmuc = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
    $query_dmuc = mysqli_query($mysqli, $sql_dmuc);
    $row_title = mysqli_fetch_array($query_dmuc);
    
?>

<h3 class="danhmuc"><i class="fa fa-list " aria-hidden="true"></i><?php echo $row_title['ten_danhmuc'] ?><i class="fa fa-sort-desc" aria-hidden="true"></i></h3>
                <ul class="list_product"> 
                    <?php 
                        while($row_product =mysqli_fetch_array($query_product)){
                    ?>
                        <li>
                            <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                            <img src="admin/tongthe/sanpham/uploads/<?php echo $row_product['hinhanh'] ?>" alt="">
                            <p class="name_product"><?php echo $row_product['ten_sanpham'] ?></p>
                            <p class="price_product"> <?php echo number_format( $row_product['gia_sanpham'],0,',','.').' VND' ?></p>
                            </a>
                        </li>
                        <?php 
                        }
                        ?>
                    </ul>
                    