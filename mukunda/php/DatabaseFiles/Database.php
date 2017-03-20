<?php
  namespace DatabaseFiles;
  
  interface Database {
    public function insert($object);
    public function get($id);
    public function update($object);
    public function delete($id);
  }
?>