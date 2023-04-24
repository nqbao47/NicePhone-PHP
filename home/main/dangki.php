<?php 

    if(isset($_POST['dangki'])) {
        $tenkhach = $_POST['hoten'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $matkhau = md5($_POST['matkhau']);
        $sql_dangki = mysqli_query($mysqli, 
                "INSERT INTO tbl_dangki(ten_khach, email, diachi, sdt, matkhau) 
                 VALUE('".$tenkhach."', '".$email."','".$diachi."', '".$sdt."','".$matkhau."')  ");
        if($sql_dangki) {
            echo '<p style="color:green"> Đăng kí thành công</p>';
            $_SESSION['dangki'] = $tenkhach;
  
            $_SESSION['id_khach'] = mysqli_insert_id($mysqli);

            header('Location: index.php?quanly=giohang');
        }
    }
?>

<p>ĐĂNG KÍ THÀNH VIÊN</p>
<style>   
    table.dangki tr td {
        padding: 10px;
    }
    a.cotaikhoan {
        border: 1px solid #000;
        background-color: #fff;
        text-decoration: none;
        padding: 7px;
        /* text-align: center; */
        margin-left: 121px;
    }
    a.cotaikhoan:hover {
        background-color: lightseagreen;
        color: #fff;
        transition: all 0.5s ease;
    }
</style>
<form style="text-align: center;"  action="" method="POST">
<table  class="dangki" style="border-collapse:collapse ; width:100%; " border="1">
    <tr>
        <td>Họ và tên</td>
        <td> <input size="50" type="text" name="hoten"> </td>
    </tr>
    <tr>
        <td>Email</td>
        <td> <input size="50" type="text" name="email"> </td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td> <input size="50" type="text" name="diachi"> </td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td> <input size="50" type="text" name="sdt"> </td>
    </tr>
    <tr>
        <td>Mật khẩu</td>
        <td> <input size="50" type="text" name="matkhau"> </td>
    </tr>
    <tr>
        <td> <input type="submit" name="dangki" value="Đăng kí"> </td>
        <td><a class="cotaikhoan" href="index.php?quanly=dangnhap">Đã có tài khoản</a></td>
    </tr>
</table>
</form>