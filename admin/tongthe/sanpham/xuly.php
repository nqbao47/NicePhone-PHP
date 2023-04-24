<?php 
include('../../config/config.php');
    $tensp = $_POST['tensp'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time(). '_' . $hinhanh;
    
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $trangthai = $_POST['trangthai'];
    $danhmuc = $_POST['danhmuc'];


    if(isset($_POST['themsanpham'])){
        $sql_them = "insert into tbl_sanpham(ten_sanpham, ma_sanpham, gia_sanpham, soluong, hinhanh, tomtat, noidung, trangthai, id_danhmuc) 
            value('".$tensp."' , '".$masp."', '".$giasp."', '".$soluong."', '".$hinhanh."', '".$tomtat."', '".$noidung."', '".$trangthai."', '".$danhmuc."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/' .$hinhanh);
        header('Location:../../index.php?action=sanpham&query=them');
    }
    elseif(isset($_POST['suasanpham'])) {

        if($hinhanh != '') {
            move_uploaded_file($hinhanh_tmp,'uploads/' .$hinhanh);
            
           
            $sql_sua = "UPDATE tbl_sanpham SET ten_sanpham = '".$tensp."', ma_sanpham='".$masp."', gia_sanpham='".$giasp."', soluong='".$soluong."',
                    hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', trangthai='".$trangthai."', id_danhmuc='".$danhmuc."'
                    WHERE id_sanpham='$_GET[idsanpham]'";
                    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
                 unlink('uploads/'. $row['hinhanh']);
                    }
        }
        else{
            $sql_sua = "UPDATE tbl_sanpham SET ten_sanpham = '".$tensp."', ma_sanpham='".$masp."', gia_sanpham='".$giasp."', soluong='".$soluong."',
                     tomtat='".$tomtat."', noidung='".$noidung."', trangthai='".$trangthai."', id_danhmuc='".$danhmuc."'
                    WHERE id_sanpham='$_GET[idsanpham]'";
        }

        mysqli_query($mysqli, $sql_sua);
        header('Location:../../index.php?action=sanpham&query=them');
    }

    else{
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'. $row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_sanpham where id_sanpham = '".$id."'  ";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=sanpham&query=them');
    }
?>