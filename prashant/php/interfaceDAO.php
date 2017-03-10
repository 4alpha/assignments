<?php
include 'postgresDB.php';
//include 'mysqlDB.php';
abstract class DAO {
    public static $obj;
    static function makeObject() {
        $ini = parse_ini_file("config.ini");
        if($ini['DBDRIVER'] == 'POSTGRES') {
            $obj = new Postgres();
            return $obj;
        }
        if($ini['DBDRIVER'] == 'MYSQL') {
            $obj = new Mysql();
            return $obj;
        }        
    }
    abstract protected function get($pri_key);
    abstract protected function getAll();
    abstract protected function add($obj);
    abstract protected function update($obj);
    abstract protected function delete($pri_key);
}
?>