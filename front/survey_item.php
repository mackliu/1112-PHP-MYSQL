<?php
if(isset($_GET['id'])){
    $survey=find("survey_subject",$_GET['id']);
    $options=all("survey_options",['subject_id'=>$_GET['id']]);
/*     dd($survey);
    dd($options); */
}else{
    $error="請回到問卷首頁選擇正確的題目來進行";
}

?>
<h3 class="text-center font-weight-bold">Lorem ipsum dolor sit</h3>

<form action="./api/survey_vote.php">
<div class="col-8 mx-auto mt-4">
    <?php
    if(isset($error)){
        echo "<span style='color:red'>".$error."</span>";
    }else{

    ?>
    <!--列表項目--> 
    <div class="input-group" style="margin-top:-1px">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" name="option">
            </div>
        </div>
        <div class="form-control">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </div>
    </div>   
    <?php
        }
    ?>
</div>
<?php
if(!isset($error)){
?>
    <div class="text-center mt-4">
        <input type="submit" class="btn btn-primary mx-1" value="投票">
        <a href="index.php?do=survey" class="btn btn-warning mx-1">取消返回</a>
    </div>
<?php
}
?>
</form>