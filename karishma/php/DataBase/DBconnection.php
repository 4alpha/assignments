<?php
namespace DataBase;

$GLOBALS["host"] = "localhost";
$GLOBALS["dbname"] = "employee";
$GLOBALS["user"] = "postgres";
$GLOBALS["password"] = "psql";

abstract class DBconnection {

    public static function getConnection() {
        $db_config = parse_ini_file( 'config.ini' );
        if ( $db_config['driver'] == 'postgres' ) {
            $db = new \DataBase\Postgres();
            return $db;
        } elseif( $db_config['driver'] == 'mysql' ) {
            $db = new Mysql();
            $this->db = $db;
            return $db;
        }  
    }

    abstract  function getRow( $query );
    abstract  function addData( $query );
    abstract function updateData( $query );
    abstract  function delete( $query );
} 
?>