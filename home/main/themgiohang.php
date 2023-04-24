<?php 
//    echo $_GET['idsanpham'];
    session_start();
    include('../../admin/config/config.php');
    //them so luong
    if(isset($_GET['themsl'])){
        $id = $_GET['themsl'];
        foreach ($_SESSION['giohang'] as $giohang_item) {
            if ($giohang_item['id'] != $id) {
                $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $giohang_item['soluong'], 'hinhanh' => $giohang_item['hinhanh'] );
                $_SESSION['giohang'] = $product_arr;
            }
            else{
                $tangsoluong = $giohang_item['soluong']+1;
                if($giohang_item['soluong'] <= 9){
                    $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $tangsoluong, 'hinhanh' => $giohang_item['hinhanh'] );
                }
                else{
                    $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $giohang_item['soluong'], 'hinhanh' => $giohang_item['hinhanh'] );
                }
                $_SESSION['giohang'] = $product_arr;
            }
        }
        header('Location:../../index.php?quanly=giohang');

    }
    //bot so luong
    if(isset($_GET['botsl'])){
        $id = $_GET['botsl'];
        foreach ($_SESSION['giohang'] as $giohang_item) {
            if ($giohang_item['id'] != $id) {
                $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $giohang_item['soluong'], 'hinhanh' => $giohang_item['hinhanh'] );
                $_SESSION['giohang'] = $product_arr;
            }
            else{
                $tangsoluong = $giohang_item['soluong'] -1;
                if($giohang_item['soluong'] >= 1){
                    $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $tangsoluong, 'hinhanh' => $giohang_item['hinhanh'] );
                }
                else{
                    $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $giohang_item['soluong'], 'hinhanh' => $giohang_item['hinhanh'] );
                }
                $_SESSION['giohang'] = $product_arr;
            }
        }
        header('Location:../../index.php?quanly=giohang');

    }
    //Xoa tung san pham:
    if(isset($_SESSION['giohang'])  &&  isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        foreach($_SESSION['giohang'] as $giohang_item){

            if($giohang_item['id'] != $id){
                $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $giohang_item['soluong'], 'hinhanh' => $giohang_item['hinhanh'] );
            }

            $_SESSION['giohang'] = $product_arr;
            header('Location:../../index.php?quanly=giohang');

        }
    }
    //Xoa tat ca:
    if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
        unset($_SESSION['giohang']);
        header('Location:../../index.php?quanly=giohang');
    }
    //them sp vao gio hang:
    if(isset($_POST['themgiohang'])) {
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product = array(array('ten_sanpham'=> $row['ten_sanpham'], 'ma_sanpham'=> $row['ma_sanpham'], 'id' => $id,
             'gia_sanpham' => $row['gia_sanpham'], 'soluong' => $soluong, 'hinhanh' => $row['hinhanh']));
                //kiem tra session gio hang ton tai
             if(isset($_SESSION['giohang'])){
                $found = false;
                foreach($_SESSION['giohang'] as $giohang_item){
                    //neu du lieu trung
                    if($giohang_item['id'] == $id ) {
                        $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                                'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $soluong + 1, 'hinhanh' => $giohang_item['hinhanh'] );
                        $found = true;       
                    }
                    else{
                        //neu du lieu khong trung
                        $product_arr[] = array('ten_sanpham'=> $giohang_item['ten_sanpham'], 'ma_sanpham'=> $giohang_item['ma_sanpham'], 'id' => $giohang_item['id'],
                        'gia_sanpham' => $giohang_item['gia_sanpham'], 'soluong' => $giohang_item['soluong'], 'hinhanh' => $giohang_item['hinhanh'] );
                    }
                }
                if($found == false) {
                    // lk du lieu new vs productarr
                    $_SESSION['giohang'] = array_merge($product_arr, $new_product);
                }
                else{
                    $_SESSION['giohang'] = $product_arr;
                }
             }
             else{
                 $_SESSION['giohang'] = $new_product;
             }
        }
            header('Location:../../index.php?quanly=giohang');
         // print_r($_SESSION['giohang']);
 
        }

?>