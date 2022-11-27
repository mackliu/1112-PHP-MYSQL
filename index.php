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

</body>
</html>