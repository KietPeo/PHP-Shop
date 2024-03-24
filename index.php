<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ Điện Tử</title>
</head>

<body>
        <?php
        spl_autoload_register(function ($class) {
            include_once "app/models/class.smtp.php"; 
            include_once "app/models/class.smtp.php";
            include_once 'system/libs/' . $class . '.php';
        });

        include_once 'app/config/config.php';
        $main = new main();
        ?>

</body>

</html>