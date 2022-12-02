<h1>資料庫常用自訂函式</h1>
<h3>all()-存取指定條件的多筆資料</h3>
<?php
include_once "./db/base.php";


//$rows=all('students',['name'=>'宋時雨']);
//$rows=all('students',['dept'=>1,'graduate_at'=>1]);
//$rows=all('students',['dept'=>1,'graduate_at'=>1]," ORDER BY `id` desc");
//dd($rows);
//

$row=find('students',100);
dd($row);
$row=find('students',['name'=>'林玟玲']);
dd($row);

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
            //是陣列 ['product'=>'PC','price'=>'10000'];

            foreach($args[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql=$sql ." WHERE ". join(" && " ,$tmp);
        }else{
            //是字串
            $sql=$sql . $args[0];
        }
    }

    if(isset($args[1])){
        $sql = $sql . $args[1];
    }

    //echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}


//傳回指定id的資料
                    //['acc'=>'mack','pw'=>1234];
                    // 1,200,312
function find($table,$id){
    global $pdo;
    $sql="select * from `$table` ";

    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='$id'";
    }


    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

?>