<?php
ini_set('display_errors',1);
// require_once'first.php';
use classes\first as first;
use classes\second as second;
use classes\third\Four as four;	
  $a = new first();
  $b = new second();
	$c=new four();
  echo $a->show();
  echo $b->show();
  echo $c->show();

  function __autoload($class) {
    $class = str_replace("\\","/",$class).".php";
    print($class);
    require_once $class;
  }

?>
