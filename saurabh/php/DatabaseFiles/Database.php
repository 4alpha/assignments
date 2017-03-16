<?php
  namespace DatabaseFiles;
  
  abstract class Database {
    abstract public function select($query);
    abstract public function insert($query);
    abstract public function update($query);
    abstract public function delete($query);
}
?>