<nav class="d-flex justify-content-center">
<div>
    <a class="btn btn-primary m-2" href="?do=students_list">全部</a>
</div>
<div class="d-flex flex-wrap col-md-7">
<?php
    //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
    $sql="SELECT `id`,`code`,`name` FROM `classes`";
    $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach($classes as $class){
        echo "<a class='btn btn-success m-2' href='?do=students_list&code={$class['code']}'>{$class['name']}</a>";
    }
?>
</div>

</nav>    