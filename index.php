
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
    <?php
//使用PDO方式建立資料庫連線物件
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

//建立撈取學生資料的語法，限制只撈取前20筆
$sql="SELECT * FROM `students` LIMIT 20";

//執行SQL語法，並從資料庫取回全部符合的資料，加上PDO::FETCH_ASSOC表示只需回傳帶有欄位名的資料
$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
</head>
<body>
<h1>學生管理系統</h1>
<nav>
    <a href="add.php">新增學生</a>
    <a href="reg.php">教師註冊</a>
    <a href="login.php">教師登入</a>

</nav>
<!--建立顯示學生列表的表格html語法-->
<table class='list-students'>
<tr>
    <td>學號</td>
    <td>姓名</td>
    <td>生日</td>
    <td>畢業國中</td>
    <td>年齡</td>
    <td>操作</td>
</tr>    
<?php
//使用迴圈來顯示每一位學生的資料
foreach($rows as $row){ 
    $age=round((strtotime('now')-strtotime($row['birthday']))/(60*60*24*365),1);
    
 echo "<tr>";
 echo "<td>{$row['school_num']}</td>";
 echo "<td>{$row['name']}</td>";
 echo "<td>{$row['birthday']}</td>";
 echo "<td>{$row['graduate_at']}</td>";
 echo "<td>{$age}</td>";
 echo "<td>";
 //加上連結將頁面導向edit.php，同時以GET方式將學生資料的id傳遞到edit.php
 echo "<a href='edit.php?id={$row['id']}'>編輯</a>";
 //加上連結將頁面導向del.php，同時以GET方式將學生資料的id傳遞到del.php
 echo "<a href='del.php?id={$row['id']}'>刪除</a>";
 echo "</td>";
 echo "</tr>";
}
?>
</table>
</body>
</html>