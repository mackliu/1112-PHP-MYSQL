<?php
//使用PDO方式建立資料庫連線物件
include "../db/base.php";

//建立變數接收表單傳送過來的資料
$school_num=$_POST['school_num'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$uni_id=$_POST['uni_id'];
$addr=$_POST['addr'];
$parents=$_POST['parents'];
$tel=$_POST['tel'];
$dept=$_POST['dept'];
$graduate_at=$_POST['graduate_at'];
$status_code=$_POST['status_code'];

//學員所屬班級在另一張資料class_student
$class_code=$_POST['class_code'];

//預設年度都是2000年
$year=2000;

//透過SQL語法從class_student資料表中找出某班級的最大座號並加1做為新增的學生的座號
$max_num=$pdo->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn();
$seat_num=$max_num+1;
//$seat_num=$pdo->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn()+1;

//建立新增學生資料到students資料表的語法並帶入相關的變數
$sql="INSERT INTO `students` 
(`id`, `school_num`, `name`, 
 `birthday`, `uni_id`, `addr`, 
 `parents`, `tel`, `dept`, 
 `graduate_at`, `status_code`) VALUES 
(NULL, '$school_num', '$name', 
 '$birthday', '$uni_id', '$addr', 
 '$parents', '$tel', $dept, 
 $graduate_at, '$status_code')";

//建立新增學生所屬班級資料到class_student資料表的語法，並帶入相關的變數
$sql_class="INSERT INTO `class_student`(`school_num`,`class_code`,`seat_num`,`year`) values('$school_num','$class_code','$seat_num','$year')";

//測試階段可以印出sql語法來確認表單傳送過來的值和處理過的資料是否正確
echo $sql;
echo $sql_class;
//$pdo->query($sql);
//分別執行兩個新增的語法，如果新增成功，會回傳受影響的資料數，一個新增語法執行成功會回傳1。
$res1=$pdo->exec($sql);
$res2=$pdo->exec($sql_class);
//echo "新增成功:".$res1;
if($res1 && $res2){
    $status='add_success';
}else{
    $status='add_fail';
}
header("location:../admin_center.php?status=$status");

?>