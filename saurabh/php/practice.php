<?php
  echo addcslashes('saurabh','a..z');
  echo "<br>";
  echo addslashes("saurabh's");
  echo "<br>";
  echo bin2hex("11111001");
  echo "<br>";
  $str = "  hello world  chopped";
  echo $str;  
  echo "<br>";
  echo chop($str,"world");
  echo "<br>";
  echo chr(65);
  echo chunk_split('hello',2,'.');
  echo "<br>";
  echo crypt($str,salt);
  echo "<br>";
  $str = "Hello world. It's a beautiful day.";
  print_r (explode(" ",$str));
  echo "<br>";
  echo metaphone("saurabh");
  echo "<br>";
  $amount = 10000.45;
  setlocale(LC_MONETARY,"en_US");
  echo money_format("the price %i",$amount);
  echo nl2br("One line.\nAnother line.");
?>