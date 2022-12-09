<?php
include_once "../db/base.php";

$option_id=$_POST['option'];
$option=find('survey_options',$option_id);
dd($option);


?>