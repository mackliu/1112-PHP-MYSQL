<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$acc=trim(strip_tags($_POST['acc']));
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);

echo "acc=>".$acc;
echo "<br>";
echo "pw=>".$pw;
echo "<br>";
echo "name=>".$name;
echo "<br>";
echo "email=>".$email;
echo "<br>";

