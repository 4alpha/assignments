<?php

interface DataBase {
  // public function connect($connection);
  public function select($query);
  public function insert($query);
  public function update($query);
  public function delete($query);
}
?>