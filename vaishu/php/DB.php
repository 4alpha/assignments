<?php

   interface DB {
    // public static function getConnection() {
    //   $dbconn1 = parse_ini_file("/home/developer/code/assignments/vaishu/php/Config.ini");
    //   if($dbconn1[DBDRIVER] == 'Postgres') {
    //     $db = new PostgresDB();
    //     return $db;
    //   }
    //   elseif($dbconn1[DBDRIVER] == 'mysql') {
    //     echo "mysql driver set";    
    //   }
    // }
   public function getAll($query);
   public function add($query);
   public function delete($query);
   public function update($query);
}
?>