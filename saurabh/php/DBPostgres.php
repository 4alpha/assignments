<?php
  require 'DataBase.php';
  class DBPostgres implements DataBase {
    function DBPostgres() {
      $dbcon = pg_connect("host = localhost dbname = employees user = postgres password = psql")
      or die('could not connect');
    }
    public function select($query) {
      $get = pg_query($query);
      while($result = pg_fetch_object($get)) {
        $res = $res + print_r($result);
      }
      return $res;
    }
    public function insert($query) {
      $result = pg_query($query);
      $cnt = pg_affected_rows($result);
      return $cnt;
    }
    public function update($query) {
      $result = pg_query($query);
      $cnt = pg_affected_rows($result);
      return $cnt;
    }
    public function delete($query) {
      $result = pg_query($query);
      $cnt = pg_affected_rows($result);      
      return $cnt;
    }
  }
?>