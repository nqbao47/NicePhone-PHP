<?php 
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $matkhaucu = md5($_POST['matkhaucu']);
        $matkhaumoi = md5($_POST['matkhaumoi']);  
        $sql = "SELECT * FROM tbl_dangki
                WHERE email = '".$taikhoan."' 
                AND matkhau= '".$matkhaucu."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count > 0 ) {
            $sql_update = mysqli_query($mysqli, "UPDATE tbl_dangki 
                                                 SET matkhau= '".$matkhaumoi."' " );
            echo '<pstyle="color: green"> Mật khẩu đã đc thay đổi !!!  </p>';
        }
        else{
            echo '<p style="color: red"> Tài khoản cũ sai !!! hãy nhập lại  </p>';
        }
    }
?>

<p class="doimk">ĐỔI MẬT KHẨU</p>
<form action="" method="POST">
    <table class="table-log" style="text-align:center; border-collapse: collapse" border="1">
        <tr>
            <td colspan="2"><h3>Đổi mật khẩu admin</h3> </td> 
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td> <input type="text" name="email"> </td>
        </tr>
        <tr>
            <td>Mật khẩu Cũ</td>
            <td><input type="text" name="matkhaucu"></td>
        </tr>
        <tr>
            <td>Mật khẩu Mới</td>
            <td><input type="text" name="matkhaumoi"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="doimatkhau" value="Tiến hành đổi"></td>
        </tr>
    </table>
    </form>