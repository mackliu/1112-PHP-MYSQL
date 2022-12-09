<?php
$subject=find("survey_subject",$_GET['id']);
$options=all("survey_options",['subject_id'=>$_GET['id']]);
/* dd($subject);
dd($options); */
?>
<h3 class="text-center font-weight-bold">調查結果</h3>

<h3 class="text-primary text-center"><?=$subject['subject'];?></h3>
<ul class="list-group col-10 mx-auto">
    <li class="d-flex list-group-item list-group-item-light list-group-item-action">
        <div class="col-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        <div class="col-6">
            <div class="bg-primary rounded">&nbsp;</div>
        </div>
    </li>
</ul>
<div class="text-center mt-4">

    <a href="index.php?do=survey" class="btn btn-warning mx-1">返回</a>
</div>
