<?php
include "../db/base.php";

//echo $_GET['id'];
$student=$pdo->query("SELECT * FROM `students` where `id`='{$_GET['id']}'")
             ->fetch(PDO::FETCH_ASSOC);
$sql_class="DELETE FROM `class_student` WHERE `school_num`='{$student['school_num']}'";
$sql_student="DELETE FROM `students` WHERE `id`='{$_GET['id']}'";

echo $sql_class;
echo "<br>";
echo $sql_student;
echo "<br>";
//$pdo->query($sql);
$res_class=$pdo->exec($sql_class);
$res_student=$pdo->exec($sql_student);
echo $res_class;
echo "<br>";
echo $res_student;
echo "刪除成功:";

//因為刪除的功能被移到後台，所以刪除成功後將使用者導回後台頁面
header("location:../admin_center.php?del=已成功刪除學生{$student['name']}的所有資料！！");
?>