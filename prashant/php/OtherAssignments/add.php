<?php
$a = 10;
$b=20;

function add() {
    $GLOBALS['addition'] =$GLOBALS['a'] + $GLOBALS['b'];
}
add();
echo $addition;
?>