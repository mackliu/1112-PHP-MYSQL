<h1>自訂函式</h1>
<?php

echo sum(10,10);


function sum($a,$b){
    $sum=$a+$b;
//    return $sum;
    return $sum;
}
/* function sum(...$nums){
    $sum=0;
    foreach($nums as $num){
        $sum=$sum+$num;
        //$sum+=$num;
    }

    return $sum;
} */

$rows=all('students');
dd($rows);

//direct dump
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function all($table){
    $sql="SELECT * FROM `$table`";
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,'root','');

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


?>