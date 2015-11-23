<?php
function arrayPrettyPrint($arr, $level) {
    foreach($arr as $k => $v) {
        for($i = 0; $i < $level; $i++)
            echo("&nbsp;");   // You can change how you indent here
        if(!is_array($v))
            echo($k . " => " . $v . "<br/>");
        else {
            echo($k . " => <br/>");
            arrayPrettyPrint($v, $level+1);
        }
    }
}

//var_dump($tweet);
//arrayPrettyPrint($tweet, 0);

?>