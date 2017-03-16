<?php
class Employee {
  var $empno,$fname,$lname,$bdate,$gender,$hdate;
  function __construct($empno,$fname,$lname,$bdate,$gender,$hdate) {
    $this->empno=$empno;
    $this->fname=$fname;
    $this->lname=$lname;
    $this->bdate=$bdate;
    $this->gender=$gender;
    $this->hdate=$hdate;
  }
}
?>