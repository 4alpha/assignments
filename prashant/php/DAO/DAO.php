<?php
  namespace DAO;
  
  interface DAO {
    public function get($id);
    public function getAll();
    public function insert($object);
    public function update($object);
    public function delete($id);
  }
?>