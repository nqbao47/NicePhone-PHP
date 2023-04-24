<?php 
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat'] == 1) {
        unset($_SESSION['dangnhap']);
        header('Location: login.php');
    }
?>

<p>
    <a class="header" href="index.php?dangxuat=1">Đăng xuất tài khoản:
        <a style="color:green;font-weight:bold"><?php 
            if(isset($_SESSION['dangnhap'])){
                echo $_SESSION['dangnhap'];
            }
        ?>       
        </a> 
    </a>
</p > 