

<div class="main">
            <?php include("danhmuc/danhmuc.php");
            ?>
            <div class="product">
                <?php 
                    if(isset($_GET['quanly'])){
                        $tmp = $_GET['quanly'];
                    }else {
                        $tmp = '';
                    }
                    if($tmp == 'danhmucsanpham'){
                        include("main/danhmuc.php");
                    }elseif($tmp == 'giohang') {
                        include("main/giohang.php");
                    }elseif($tmp == 'lichsudonhang') {
                        include("main/lichsudonhang.php");
                    }elseif($tmp == 'sanpham') {
                        include("main/sanpham.php");
                    }elseif($tmp == 'dangki') {
                        include("main/dangki.php");
                    }elseif($tmp == 'thanhtoan') {
                        include("main/thanhtoan.php");
                    }elseif($tmp == 'dangnhap') {
                        include("main/dangnhap.php");
                    }elseif($tmp == 'timkiem') {
                        include("main/timkiemsp.php");
                    }elseif($tmp == 'thongbao') {
                        include("main/thongbao.php");
                    }elseif($tmp == 'doimatkhau') {
                        include("main/doimatkhau.php");
                    }else{
                        include("main/index.php");
                    }
                ?>
            </div>
            
        </div>