<?php
include "./db/base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include "./layouts/header.php";
?>

<h1 style='text-align:center'>學生管理系統</h1>
<nav>
    <a href="reg.php">教師註冊</a>
    <a href="login.php">教師登入</a>
</nav>

<?php
    include "./layouts/class_nav.php"
?>  
<?php
    include "./front/main.php";
?>

</body>
</html>