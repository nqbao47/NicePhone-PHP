<?php 
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['tendangnhap'];
        $matkhau = md5($_POST['matkhau']); 
        $sql = "SELECT * FROM tbl_admin 
                WHERE username = '".$taikhoan."' 
                AND password= '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count > 0 ) {
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
        }
        else{
            header("Location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <style type="text/css" >
        body {
            background-color: lightgrey;
        }
        h1 {
            color: darkred;
            text-align: center;
        }
        .container {
            padding: 5px;
            margin: 0 auto;
            width: 20%;

        }
        td.dangnhap {
            padding: 10px;
        }
        form {
            text-align: center;
            margin-left: 42px;
        }
        table.table-log {
            /* text-align: center; */
            /* align-items: center; */
            margin: 35px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>NICE PHONE <sup>@</sup> </h1>
    <form action="" method="POST">
    <table class="table-log" style="text-align:center; border-collapse: collapse;table-layout:fixed" border="1">
        <tr>
            <td colspan="2"><h3>ĐĂNG NHẬP</h3> </td> 
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td> <input type="text" name="tendangnhap"> </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"></td>
        </tr>
        <tr>
            <td class="dangnhap" colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập"></td>
        </tr>
    </table>
    </form>

</div>
</body>
</html>

