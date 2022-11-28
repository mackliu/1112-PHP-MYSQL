<?php
include_once "../db/base.php";

$pdo->exec("DELETE FROM `news` WHERE `id`='{$_GET['id']}'");
header("location:../admin_center.php?do=news");

?>