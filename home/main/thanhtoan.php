<?php
    session_start();
    include("../../admin/config/config.php");

    $id_khach = $_SESSION['id_khach'];
    $code_donhang = rand(0,9999);
    $insert_giohang =  "INSERT INTO tbl_giohang(id_khach, ma_giohang, trangthai_giohang) 
                        VALUE('".$id_khach."', '".$code_donhang."', 1) ";
    $giohang_query = mysqli_query( $mysqli ,$insert_giohang);
    if($giohang_query) {
        foreach($_SESSION['giohang'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_chitietdonhang = "INSERT INTO tbl_chitietgiohang(id_sanpham, ma_don, soluongspmua) 
            VALUE('".$id_sanpham."', '".$code_donhang."', '".$soluong."') "; mysqli_query($mysqli, $insert_chitietdonhang );
          }
    }
    unset($_SESSION['giohang']);
    header('Location: ../../index.php?quanly=thongbao');
?> 