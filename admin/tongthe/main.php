<div class="clear"></div>
<div class="main">
    <?php 
                    if(isset($_GET['action']) && $_GET['query']) {
                        $tmp = $_GET['action'];
                        $query = $_GET['query'];
                    }else {
                        $tmp = '';
                        $query = '';
                    }

                    if($tmp == 'quanlydanhmucsanpham' && $query=='them'){
                        include("tongthe/danhmuc/them.php");
                        include("tongthe/danhmuc/lietke.php");
                    }elseif ($tmp == 'quanlydanhmucsanpham' && $query=='sua'){
                        include("tongthe/danhmuc/sua.php");
                    }elseif ($tmp == 'sanpham' && $query=='them'){
                        include("tongthe/sanpham/them.php");
                        include("tongthe/sanpham/lietke.php");
                    }elseif($tmp == 'sanpham' && $query=='sua'){
                        include("tongthe/sanpham/sua.php");
                    }elseif($tmp == 'qldonhang' && $query=='lietke'){
                        include("tongthe/qldonhang/lietke.php");
                    }elseif($tmp == 'kiemtra' && $query=='kiemtradon'){
                        include("tongthe/qldonhang/kiemtra.php");
                    }           
                    else{
                        include("tongthe/welcome.php");
                    }
                    
        ?>
</div>