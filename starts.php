<h2>使用函式來印星星</h2>
<pre>
<?php

starts('正三角形',10);
starts('菱形',11);
starts('矩形',20);
starts('直角三角形',12);
starts('正三角形',20);


function starts($shape,$size){
    switch($shape){
        case "正三角形":
            for($i=1 ; $i <= $size ;$i++){
    
                for($k=1; $k <=($size-$i);$k++){
                    echo "&nbsp;";    
                }
                
                for($j=1 ; $j <= (2*$i-1) ; $j++){
                    echo "*";
                }
                echo "<br>";
            }
        break;
        case "菱形":
            $temp=0;
            for($i=1;$i<=$size;$i++){
             
              if($i>ceil($size/2)){
                $temp=$temp-1;
              }else{
                $temp=$i;
              }
             
              for($j=1;$j<=(floor($size/2)+$temp);$j++){
                if($j<=(ceil($size/2)-$temp)){
                  echo "&nbsp;";
                }else{
                  echo "*";
                }
              }
              echo "<br>";
            }
        break;
        case "矩形":
            for($i=1 ; $i<=$size ; $i++){

                for( $j=1 ; $j<=$size ; $j++ ){
                  
                  if($i==1 || $i==$size){
                    
                    echo "*";
                    
                  }else if($j==1 || $j==$size){  
                  
                    echo "*";
                    
                  }else{
                  
                    echo "&nbsp;";
                    
                  }
                  
                }
                
                echo "<br>";
              }
        break;
        case "直角三角形":
            for($i=1;$i<=$size;$i++){

                for($j=1;$j<=$i;$j++){ //在內圈中，我們把外圈的變數$i當成內圈次數的限制
                    echo "*";
                }
                echo "<br>";
            }
            
        break;
    }

}




?>
</pre>