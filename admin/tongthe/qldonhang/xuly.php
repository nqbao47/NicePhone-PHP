<?php
    include('../../config/config.php');
    if(isset($_GET['code'] )) {
        $ma_giohang = $_GET['code'];
        $sql_update = "UPDATE tbl_giohang 
                       SET trangthai_giohang=0 
                       WHERE ma_giohang='".$ma_giohang."'";
        $query = mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=qldonhang&query=lietke');
    }
?>