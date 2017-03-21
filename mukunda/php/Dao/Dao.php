<?php
  namespace Dao;

  interface Dao {
    public function add($object);
    public function get($id);
    public function update($object);
    public function delete($id);
    public function getAll();
  }
?>
