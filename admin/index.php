<?php 
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"> </script>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>Admin</title>
</head>
<body>
    <h3 class="title_ad">Đây là trang Admin</h3>
    <div class="container">
    <?php 
            include("config/config.php");
            include("tongthe/header.php");
            include("tongthe/menu.php");
            include("tongthe/main.php");
            include("tongthe/footer.php");
            
        ?>
        </div>
</body>
</html>