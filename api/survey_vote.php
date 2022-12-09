<?php
include_once "../db/base.php";

$option_id=$_POST['option'];
$option=find('survey_options',$option_id);
$subject=find("survey_subject",$option['subject_id']);
//echo "++前";
//dd($subject);

$subject['vote']++;
$option['vote']++;
//$subject['vote']=$subject['vote']+1;
//echo "<br>++後";
//dd($subject);
/* update("survey_subject",['vote'=>$subject['vote']],$subject['id']);
echo "<hr>"; */
update("survey_subject",$subject,$subject['id']);
update("survey_options",$option,$option['id']);

to("../index.php?do=survery_result&id={$subject['id']}");

?>