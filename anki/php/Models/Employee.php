<?php
namespace Models;
class Employee {
  var $empno,$fname,$lname,$bdate,$gender;

  function __construct($empno,$fname,$lname,$bdate,$gender) {
    $this->empno=$empno;
    $this->fname=$fname;
    $this->lname=$lname;
    $this->bdate=$bdate;
    $this->gender=$gender;
  }
}
?>
