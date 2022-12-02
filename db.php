<h1>資料庫常用自訂函式</h1>
<h3>all()-存取指定條件的多筆資料</h3>
<?php
include_once "./db/base.php";


//$rows=all('students',['name'=>'宋時雨']);
//$rows=all('students',['dept'=>1,'graduate_at'=>1]);
//$rows=all('students',['dept'=>1,'graduate_at'=>1]," ORDER BY `id` desc");
//dd($rows);
//
?>
<h3>find()-存取指定條件的單筆資料</h3>
<?php
/* $row=find('students',100);
dd($row);
$row=find('students',['name'=>'林玟玲']);
dd($row); */
?>

<h3>update()-更新指定條件的資料</h3>
<?php

//update('students',['name'=>'劉勤永','dept'=>'2','graduate_at'=>'3']);
//update('students',['name'=>'王大同','dept'=>'4'],['id'=>19]);
//update students set name='王大同',dept='4' where id='19'

//$num=update('class_student',['class_code'=>102],['class_code'=>101]);
//echo "一供有".$num."筆資料更新成功";

update('class_student',['class_code'=>101],18);
?>




<?php
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

//給定條件更新資料(多筆或單筆)
function update($table,$col,...$args){
    global $pdo;

    $sql="update $table set ";

    if(is_array($col)){
        foreach($col as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql .  join(",",$tmp);

    }else{
        echo "錯誤,請提供以陣列型式的更新資料";
    }

    if(isset($args[0])){
        if(is_array($args[0])){
            $tmp=[];
            foreach($args[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
    
            $sql = $sql . " where " . join(" && ",$tmp);
    
        }else{
    
            $sql=$sql . " where `id`='{$args[0]}'";
        }
    }


    echo $sql;
    //$t=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    //$t=$pdo->exec($sql);
    
    return $pdo->exec($sql);
}

?>