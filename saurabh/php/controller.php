
<?php
  include 'EmpController.php';
  
  $empctrl = new EmpController();
  if($_POST['getRow'] == 'getRows()') {
        echo 'hi';

    $empctr->getRow();
   // print($get);
    echo 'hi';
  }
?>