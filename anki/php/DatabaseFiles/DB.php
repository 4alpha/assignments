<?php
namespace DatabaseFiles;
abstract class DB {
  static function getConnectToDB() {
    if($GLOBALS['DBDRIVER'] == Postgres) {
    $db = new DBPostgres();
    return $db;
    } elseif($GLOBALS['DBDRIVER'] == Mysql) {
      return 0;
    }
  }
  abstract public function insert($queryInsert);
  abstract public function update($queryUpdate);
  abstract public function delete($queryDelete);
  abstract public function select($querySelectAll);
}

?>
