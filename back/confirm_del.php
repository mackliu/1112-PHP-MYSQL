<?php
$student = $pdo->query("SELECT * FROM `students` where `id`='{$_GET['id']}'")
               ->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-md-4 p-4 mx-auto my-5 border rounded shadow">
    <div >
        <h3 class="text-center my-2 text-danger">刪除確認</h3>
        <div class="text-danger my-5 text-center" style="font-size:2rem">
            你確定要刪除<br>
            <span class="font-weight-bolder"><?= $student['name']; ?></span>嗎?
        </div>
        <div class="text-center">
            <button class="btn btn-lg mx-2 btn-danger" onclick="location.href='./api/del_student.php?id=<?= $_GET['id']; ?>'">確定刪除</button>
            <button class="btn btn-lg mx-2 btn-warning" onclick="location.href='index.php'">取消</button>
        </div>
    </div>
</div>