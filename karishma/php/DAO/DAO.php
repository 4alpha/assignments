<?php
namespace DAO;

interface DAO {    
  public function getRow();
  public function addData( $class_object );
  public function updateData( $class_object );
  public function delete( $class_object );
}
?>
