<?php
  $a=array("Dog","Cat","Horse","Bear","Zebra");
  array_multisort($a);
  print_r($a);
  echo "<br>";

  print_r(array_change_key_case(array("first"=>1,"second"=>2),CASE_UPPER));
  echo "<br>";

  $input_array = array('a', 'b', 'c', 'd', 'e');
  print_r(array_chunk($input_array, 2));
  echo "<br>";
  //print_r(array_chunk($input_array, 2, true));

  $col=array('red','white','blue');
  $flower=array('Jasmine','chameli','rose');
  print_r(array_combine($col,$flower));
  print_r(array_count_values($col));
  echo "<br>";

  $array1 = array("a" => "green", "red", "blue", "red");
  $array2 = array("b" => "green", "yellow", "red");
  $result = array_diff($array2, $array1);
  print_r($result);
  echo "<br>";

  $a = array_fill(5, 6, 'banana');
  print_r($a);  
  echo "<br>";

  $input = array("oranges", "apples", "pears");
  $flipped = array_flip($input);
  print_r($flipped);
  echo "<br>";

  $a = array(2, 4, 6, 8);
  echo "product(a) = " . array_product($a) . "\n";
  echo "product(array()) = " . array_product(array()) . "\n";
  echo "<br>";

  foreach (range(0, 12) as $number) {
    echo $number."\t";
  }
  echo "<br>";

  
?>