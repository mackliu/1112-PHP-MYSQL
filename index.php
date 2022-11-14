
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
    <?php

//$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$db=mysqli_connect('localhost','root','','school');
mysqli_set_charset($db,'utf8');

$sql="SELECT * FROM `students` LIMIT 5";
$result=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

//$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
</head>
<body>
<h1>學生管理系統</h1>

<?php
echo "<pre>";
print_r($rows);
echo "</pre>";

?>
</body>
</html>