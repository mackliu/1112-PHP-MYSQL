<div class='col-md-6 mx-auto my-3 px-5 py-3 border shadow-sm'>
<h3 class="text-center">編輯學生資料</h3>
<?php 
if(isset($_GET['id'])){
    $sql="SELECT * FROM `students` where `id`='{$_GET['id']}'";
    $student=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}else{
    header("location:index.php?status=edit_error");
}
?>
<form action="api/edit_student.php" method="post">
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">學號</label>
        <div class="form-control col-md-8 border-0"><?=$student['school_num'];?></div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">姓名</label>
        <input class="form-control col-md-8" type="text" name="name" value="<?=$student['name'];?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">生日</label>
        <input class="form-control col-md-8" type="date" name="birthday" value="<?=$student['birthday'];?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">身份證字號</label>
        <input class="form-control col-md-8" type="text" name="uni_id" value="<?=$student['uni_id'];?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">地址</label>
        <input class="form-control col-md-8" type="text" name="addr" value="<?=$student['addr'];?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">家長</label>
        <input class="form-control col-md-8" type="text" name="parents" value="<?=$student['parents'];?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">電話</label>
        <input class="form-control col-md-8" type="text" name="tel" value="<?=$student['tel'];?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">科系</label>
            <select class="form-control col-md-8" name="dept">
                <?php
                    //從`dept`資料表中撈出所有的科系資料並在網頁上製作成下拉選單的項目
                    $sql="SELECT * FROM `dept`";
                    $depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($depts as $dept){
                        /* if($dept['id']==$student['dept']){
                            $selected='selected';
                        }else{
                            $selected='';
                        } */
                        $selected=($dept['id']==$student['dept'])?'selected':'';
                        echo "<option value='{$dept['id']}' $selected>{$dept['name']}</option>";
                    }
                ?>
            </select>
        </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">畢業學校</label>
            <select class="form-control col-md-8" name="graduate_at" >
                <?php 
                //從`graduate_school`t資料表中撈出所有的畢業學生資料並在網頁上製作成下拉選單的項目
                $sql="SELECT * FROM `graduate_school`";
                $grads=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach($grads as $grad){
                    $selected=($grad['id']==$student['graduate_at'])?'selected':'';
                    echo "<option value='{$grad['id']}' $selected>{$grad['county']}{$grad['name']}</option>";
                }
                ?>
            </select>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">畢業狀態</label>
            <select class="form-control col-md-8" name="status_code" >
                <?php 
                //從`status`資料表中撈出所有的畢業狀態並在網頁上製作成下拉選單的項目
                $sql="SELECT * FROM `status`";
                $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
                    $selected=($row['code']==$student['status_code'])?'selected':'';
                    echo "<option value='{$row['code']}' $selected>{$row['status']}</option>";
                }
                ?>
            </select>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">班級</label>
        <select class="form-control col-md-8" name="class_code">
        <?php
            $stu_class=$pdo->query("SELECT * FROM `class_student` WHERE `school_num`='{$student['school_num']}'")->fetch(PDO::FETCH_ASSOC);
            //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
            $sql="SELECT `id`,`code`,`name` FROM `classes`";
            $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $selected=($row['code']==$stu_class['class_code'])?'selected':'';
                echo "<option value='{$row['code']}' $selected>{$row['name']}</option>";
            }
        ?>
        </select>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">座號</label>
        <div class="form-control col-md-8 border-0"><?=$stu_class['seat_num'];?></div>
    </div>
    <div class="text-center">
        <input type="hidden" name="id" value="<?=$student['id'];?>">
        <input class="btn btn-primary" type="submit" value="確認修改">
    </div>
</form>
</div>