<?php
//因為session_start()太常用，所以移到base.php中,並且把include base.php放在檔案的最前面來引入
include "./db/base.php";

if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理中心</title>
    <?php include "./layouts/link_css.php";?>
    <link rel="stylesheet" href="./css/back.css">

</head>
<body>
<?php
    include "./layouts/header.php";
?>
<main class="container">
<h1 style='text-align:center'>學生管理系統</h1> 
<?php
$do=$_GET['do']??'main';
$file='./back/'.$do.".php";
//echo $file;
if(file_exists($file)){
    include $file;
}else{
    include "./back/main.php";
}
?>
</main>
<?php include "./layouts/scripts.php";?>
</body>
</html>