<?php
//因為session_start()太常用，所以移到base.php中,並且把include base.php放在檔案的最前面來引入
include "./db/base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <?php include "./layouts/link_css.php";?>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<?php
    include "./layouts/header.php";
?>

<main class='container'>
<?php

$do=$_GET['do']??'main';

/* if(isset($_GET['do'])){
    $do=$_GET['do'];
}else{
    $do='main';
} */

$file="./front/".$do.".php";
if(file_exists($file)){
    include $file;
}else{
    include "./front/main.php";
}
?>
</main>
<?php include "./layouts/scripts.php";?>
</body>
</html>