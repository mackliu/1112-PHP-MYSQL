
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

if(isset($_GET['code'])){
    $sql="SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                 `students`.`name` as '姓名',
                 `students`.`birthday` as '生日',
                 `students`.`graduate_at` as '畢業國中'
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
    $sql_total="SELECT count(`students`.`id`)
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
}else{
    //建立撈取學生資料的語法，限制只撈取前20筆
    $sql="SELECT `students`.`id`,
                 `students`.`school_num` as '學號',
                 `students`.`name` as '姓名',
                 `students`.`birthday` as '生日',
                 `students`.`graduate_at` as '畢業國中'
          FROM `students`";
    $sql_total="SELECT count(`students`.`id`)
          FROM `students`";
}
/**
 * 分頁參數處理中心
 */

 $div=10;
 $total=$pdo->query($sql_total)->fetchColumn();
 echo "總筆數為:".$total;
 $pages=ceil($total/$div);
 echo "總頁數為:".$pages;
 $now=(isset($_GET['page']))?$_GET['page']:1;
 echo "當前頁為:". $now;
 $start=($now-1)*$div;

$sql=$sql. " LIMIT $start,$div";
//執行SQL語法，並從資料庫取回全部符合的資料，加上PDO::FETCH_ASSOC表示只需回傳帶有欄位名的資料
$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
</head>
<body>
<!-- <pre>
   <?php //print_r($rows);?> ;
</pre> -->
<h1>學生管理系統</h1>
<nav>
    <a href="add.php">新增學生</a>
    <a href="reg.php">教師註冊</a>
    <a href="login.php">教師登入</a>

</nav>
<nav>
<ul class="class-list">
<?php
    //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
    $sql="SELECT `id`,`code`,`name` FROM `classes`";
    $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach($classes as $class){
        echo "<li><a href='?code={$class['code']}'>{$class['name']}</a></li>";
    }
?>  
</ul>
</nav>
<!--根據status來顯示回應-->
<?php
if(isset($_GET['status'])){
    switch($_GET['status']){
        case 'add_success':
            echo "<span style='color:green'>新增學生成功</span>";
        break;
        case 'add_fail';
            echo "<span style='color:red'>新增學生有誤</span>";
        break;
        case 'edit_error':
            echo "<span style='color:red'>無法編輯，請洽管理員，或正確操作</span>";
        break;
    }
}

?>
<div class="pages">
    <?php 
    for($i=1;$i<=$pages;$i++){
        if(isset($_GET['code'])){
            echo "<a href='?page=$i&code={$_GET['code']}'> ";
            echo $i;
            echo " </a>";
            
        }else{
            
            echo "<a href='?page=$i'> ";
            echo $i;
            echo " </a>";
        }
    }


    ?>
</div>
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
    $age=round((strtotime('now')-strtotime($row['生日']))/(60*60*24*365),1);
    
 echo "<tr>";
 echo "<td>{$row['學號']}</td>";
 echo "<td>{$row['姓名']}</td>";
 echo "<td>{$row['生日']}</td>";
 echo "<td>{$row['畢業國中']}</td>";
 echo "<td>{$age}</td>";
 echo "<td>";
 //加上連結將頁面導向edit.php，同時以GET方式將學生資料的id傳遞到edit.php
 echo "<a href='edit.php?id={$row['id']}'>編輯</a>";
 //加上連結將頁面導向del.php，同時以GET方式將學生資料的id傳遞到del.php
 echo "<a href='./api/del_student.php?id={$row['id']}'>刪除</a>";
 //echo "<a href='del.php?id={$row['id']}'>刪除</a>";
 echo "</td>";
 echo "</tr>";
}
?>
</table>
<div>
    <a href=""> < </a>
    <a href=""> 1 </a>
    <a href=""> 2 </a>
    <a href=""> 3 </a>
    <a href=""> > </a>
</div>
</body>
</html>