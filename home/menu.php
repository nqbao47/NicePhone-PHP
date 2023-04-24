<?php       
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<?php
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['dangki']);
    }
?>

<div class="menu">
                <ul class="list_menu">
                    <li><a> <img class="logoFinal" src="images/logo_new-removebg-preview.png"></a></li>
                    <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
                    <?php         
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                    <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></a></li>
                    <?php
                        }
                    ?>
                    <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>

                    <?php
                        if (isset($_SESSION['dangki'])) {
                    ?> 
                        <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                        <li><a href="index.php?quanly=doimatkhau">Đổi mật khẩu</a></li>
                    <?php
                        }else{
                    ?>    
                        <li><a href="index.php?quanly=dangki">Đăng kí</a></li>
                    <?php
                        }
                    ?>

                </ul>
                <p>
                    <form action="index.php?quanly=timkiem" method="POST">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="key" >
                        <input  type="submit" name="timkiem" value="Tìm" ><i class="fa fa-search" aria-hidden="true"></i>
                    </form>
                </p>
    </div>