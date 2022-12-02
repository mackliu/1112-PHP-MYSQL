<h1>資料庫常用自訂函式</h1>
<h3>all()-存取指定條件的多筆資料</h3>
<?php
include_once "./db/base.php";


$rows=all('students',' LIMIT 10');
dd($rows);


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * pram table - 資料表名稱
 * pram args[0] - where 條件(array)或sql字串
 * pram args[1] - order by limit 之類的sql 字串
 */

function all($table,...$args){
    global $pdo;
    $sql="select * from $table ";

    if(isset($args[0])){
        if(is_array($args[0])){
            //是陣列 ['acc'=>'mack','pw'=>'1234'];

             where `acc`='mack' && `pw`='1234';

        }else{
            //是字串
            $sql=$sql . $args[0];
        }
    }

    echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}


?>