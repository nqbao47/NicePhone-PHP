<h3 class="danhmuc"><i class="fa fa-list " aria-hidden="true"></i>Sản phẩm đang có<i class="fa fa-sort-desc" aria-hidden="true"></i></h3>
                <ul class="list_product"> 
                        <?php 
                            $sql_product = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  ORDER BY
                            tbl_sanpham.id_sanpham DESC";
                            $query_product = mysqli_query($mysqli, $sql_product);
                            
                        ?>
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
                