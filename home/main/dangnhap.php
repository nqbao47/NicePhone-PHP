<?php 
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']); 
        $sql = "SELECT * FROM tbl_dangki 
                WHERE email = '".$email."' 
                AND matkhau= '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);

        if($count > 0 ) {
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangki'] = $row_data['ten_khach'];
            $_SESSION['id_khach'] = $row_data['id_dangki'];
            
            header("Location: index.php?quanly=giohang");
        }
        else{
            echo '<p style="color:red; font-weight:bold"> Có gì đó sai sai!! Hãy thử lại</p>';
        }
    }
?>
<form action="" method="POST">
    <table class="table-log" style="text-align:center; border-collapse: collapse" border="1">
        <tr>
            <td colspan="2"><h3>ĐĂNG NHẬP</h3> </td> 
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td> <input type="text" name="email" placeholder="email" > </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau" placeholder="matkhau"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập"></td>
        </tr>
    </table>
    </form>