<?php
include 'postgresDB.php'; 
abstract class DAO {
    public static $obj;
    static function makeObject() {
        $obj = new Postgres();
        return $obj;
    }
    abstract protected function get($pri_key);
    abstract protected function getAll();
    abstract protected function add($obj);
    abstract protected function update($obj);
    abstract protected function delete($pri_key);
}
?>