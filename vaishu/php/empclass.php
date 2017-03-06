<?php
  class employee{
  public $db;
  public function __construct($db) {
    $this->db=$db;
  }
    public function add($id,$name){
       $this->db->add($id,$name);
    }
    public function getAll(){
      echo 'inside get all emp';
       $this->db->getAll();
    }
    public function update($id,$name){
       $this->db->update($id,$name);
    }
    public function delete($id,$name){
       $this->db->delete($id,$name);
    }
  }
?>