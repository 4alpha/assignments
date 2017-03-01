<?php
  include 'empclass.php';
  include 'postgresDB.php';
  $id =$_POST['emp_no'];
  $name =$_POST['emp_name'];
  $db= new postgresDB();
  $obj = new employee($db);
  
  if(isset($_POST['getALL'])){
    echo 'inside view get all';
   $obj->getALL();
   }
  if(isset($_POST['add'])){
   $obj->add($id,$name);
  $obj->getAll();
  }
  if(isset($_POST['update'])){
    $obj->update($id,$name);
    $cmdtuples = pg_affected_rows($result);
    echo $cmdtuples . " tuples are affected.\n";
  }
  if(isset($_POST['delete'])){
    $obj->delete($id);
    }
  pg_close();
?>