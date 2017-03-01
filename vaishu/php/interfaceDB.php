<?php
interface DB{
  public function getAll();
  public function add($id,$name);
  public function delete($id);
  public function update($id,$name);
}
?>