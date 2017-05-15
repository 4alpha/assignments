<?php
  namespace DAO;
  interface DAO{
    public function getAll();
    public function add($obj);
    public function delete($obj);
    public function update($obj);
  }
?>