<?php  
  namespace DataAccessObject;
  
  interface DAO {
    public function getAll();
    public function Insert($object);
    public function Update($object);
    public function Delete($p_key);
  }
?>
