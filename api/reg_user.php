<?php
include "../db/base.php";

$acc=trim(strip_tags($_POST['acc']));
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);
//$last_login="0000-00-00 00:00:00";  //移除,讓資料庫自動填入時間

//$sql="insert into `users` (`acc`,`pw`,`name`,`email`,`last_login`) values('$acc','$pw','$name','$email','$last_login')";
$sql="insert into `users` (`acc`,`pw`,`name`,`email`) values('$acc','$pw','$name','$email')";
echo "acc=>".$acc;
echo "<br>";
echo "pw=>".$pw;
echo "<br>";
echo "name=>".$name;
echo "<br>";
echo "email=>".$email;
echo "<br>";
//echo $sql;
$pdo->exec($sql);

//註冊完成後，將使用者導向登入頁
header("location:../index.php?do=login");

