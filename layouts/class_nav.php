<nav>
<ul class="class-list" >
<li>
    <a href="?do=students_list">全部</a>
</li>
<?php
    //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
    $sql="SELECT `id`,`code`,`name` FROM `classes`";
    $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach($classes as $class){
        echo "<li><a href='?do=students_list&code={$class['code']}'>{$class['name']}</a></li>";
    }
?>
</ul>

</nav>    