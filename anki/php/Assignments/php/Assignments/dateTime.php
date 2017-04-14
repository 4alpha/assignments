<?php
  $sun_info = date_sun_info(strtotime("2017-02-22"), 31.7667, 35.2333);
    foreach ($sun_info as $key => $val) {
      echo "$key: " . date("H:i:s", $val) . "\n";
}
  echo "<br>";

  $date=date_create_from_format("j-M-Y","2-Mar-2013");
  echo date_format($date,"Y-m-j");
  echo "<br>";

  $date=date_create();
  date_date_set($date,2017,02,22);
  echo date_format($date,"Y/m/d");
  echo "<br>";
  
  echo date_default_timezone_get();
  echo "<br>";

  date_default_timezone_set("US/Hawaii");
  echo date_default_timezone_get();
  echo "<br>";

  date_create("asdfghjk12345");
  print_r(date_get_last_errors());
  echo "<br>";

  $date1=date_create("2017-01-15");
  $date2=date_create("2017-02-22");
  $diff=date_diff($date1,$date2);
  echo $diff->format("Total number of days: %a.");
  echo "<br>";

  $date=date_create('2018-01-15');
  date_isodate_set($date,2018,06);
  echo date_format($date,"Y-m-d") . "<br>";
  echo "<br>";

?>
