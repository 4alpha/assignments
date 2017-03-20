<?php  
  namespace DataAccessObject;  
  interface DAO {
    public function getAll();
    public function insert($object);
    public function update($object);
    public function delete($p_key);
  }
?>
