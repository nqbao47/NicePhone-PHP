
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"> </script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>NicePhones</title>
</head>

<body>
    <div class="container">
        <?php 
            session_start();
            include("admin/config/config.php");
            include("home/header.php");
            include("home/menu.php");
            include("home/main.php");
            include("home/footer.php");
        ?>
    </div>
</body>
</html>
