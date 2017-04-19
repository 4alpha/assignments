<?php
namespace DB_Driver;
abstract class DB {
  static function getConnection() {
    if ($GLOBALS['DBDRIVER'] == "Postgres") {
      $db = new DBPostgres();
      return $db;
    } elseif ($GLOBALS['DBDRIVER'] == "Mysql") {
      return 0;
    }
  }
  abstract public function insert($query);
  abstract public function update($query);
  abstract public function delete($query);
  abstract public function select($query);
  abstract public function get($query);
}

?>
