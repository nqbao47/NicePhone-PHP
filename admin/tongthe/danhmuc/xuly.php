<?php 
include('../../config/config.php');
    $tenloaisp = $_POST['ten_danhmuc'];
    $thutu = $_POST['sothutu'];
    if(isset($_POST['themdanhmuc'])){
        //them
        $sql_them = "insert into tbl_danhmuc(ten_danhmuc, sothutu) value('".$tenloaisp."' , '".$thutu."')";
        mysqli_query($mysqli, $sql_them);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    elseif(isset($_POST['suadanhmuc'])) {
        //sua
        $sql_sua = "UPDATE tbl_danhmuc SET ten_danhmuc = '".$tenloaisp."', sothutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        mysqli_query($mysqli, $sql_sua);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    else{
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM tbl_danhmuc where id_danhmuc = '".$id."'  ";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>