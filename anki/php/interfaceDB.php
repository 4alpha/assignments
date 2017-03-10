<?php

interface DB {

  public function insert($queryInsert);
  public function update($queryUpdate);
  public function delete($queryDelete);
  public function select($querySelectAll);
}

?>
