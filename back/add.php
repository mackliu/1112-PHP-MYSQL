<div class='col-md-6 mx-auto my-3 px-5 py-3 border shadow-sm'>
<h3 class="text-center">新增學生</h3>

<form action="api/add_student.php" method="post">
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">學號</label>
        <?php
            //從資料庫中找到最大的學號
            $sql="SELECT max(`school_num`) FROM `students`";
            $max=$pdo->query($sql)->fetchColumn();
        ?>
        <!--將最大的學號+1後做為要新增的下一位學生的學號-->
        <input class="form-control col-md-8" type="text" name="school_num" value="<?=$max+1;?>">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">姓名</label>
        <input class="form-control col-md-8" type="text" name="name">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">生日</label>
        <input class="form-control col-md-8" type="date" name="birthday">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">身份證字號</label>
        <input class="form-control col-md-8" type="text" name="uni_id">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">地址</label>
        <input class="form-control col-md-8" type="text" name="addr">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">家長</label>
        <input class="form-control col-md-8" type="text" name="parents">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">聯絡電話</label>
        <input class="form-control col-md-8" type="text" name="tel">
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">科系</label>
        <select class="form-control col-md-8" name="dept">
            <?php
                //從`dept`資料表中撈出所有的科系資料並在網頁上製作成下拉選單的項目
                $sql="SELECT * FROM `dept`";
                $depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach($depts as $dept){
                    echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">畢業國中</label>
        <select class="form-control col-md-8" name="graduate_at" >
            <?php 
            //從`graduate_school`t資料表中撈出所有的畢業學生資料並在網頁上製作成下拉選單的項目
            $sql="SELECT * FROM `graduate_school`";
            $grads=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($grads as $grad){
                echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
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
                echo "<option value='{$row['code']}'>{$row['status']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-4" style="text-align-last:justify">班級</label>
        <select class="form-control col-md-8" name="class_code">
            <?php
            //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
            $sql="SELECT `id`,`code`,`name` FROM `classes`";
            $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                echo "<option value='{$row['code']}'>{$row['name']}</option>";
            }
            ?>
        </select>                
    </div>
   <div class="text-center">
       <input class="btn btn-primary" type="submit" value="確認新增">
   </div>
</form>
</div>
