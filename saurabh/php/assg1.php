<?php
  include 'controller.php';
  if(isset($_POST['getRow']))
  {
    echo $get;
  }
  if(isset($_POST['addRow']))
  {
    echo $result;
  }
  if(isset($_POST['updateRow']))
  {
    echo $result;
  }
  if(isset($_POST['deleteRow']))
  {
    echo $result;
  }
?>