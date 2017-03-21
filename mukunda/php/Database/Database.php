<?php
  namespace Database;

  interface Database {
    public function insert($query);
    public function get($query);
    public function update($query);
    public function delete($query);
    public function getAll($query);
  }
?>