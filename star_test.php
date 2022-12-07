<?php
$start = 5;

for($a=1;$a<=$start;$a++){
    for($b=1;$b<=8;$b++){
        if($b == ($a+1) or $b == ($a+2)){
            echo "*";
        }else{
            echo $b;
        }
        echo " ";
    }
    echo "<br>";
}
?>