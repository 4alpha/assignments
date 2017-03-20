<?php
namespace DBnamespace;

$GLOBALS["host"] = "localhost";
$GLOBALS["dbname"] = "employee";
$GLOBALS["user"] = "postgres";
$GLOBALS["password"] = "psql";

abstract class DBconnection {

    public static function getConnection() {
        $db_config = parse_ini_file( 'config.ini' );
        if ( $db_config['driver'] == 'postgres' ) {
            $db_object = new \DBnamespace\Postgres();
            return $db_object;
        } elseif( $db_config['driver'] == 'mysql' ) {
            $db_object = new Mysql();
            $this->db_object = $db_object;
            return $db_object;
        }  
    }

    abstract  function getRow( $query );
    abstract  function addData( $query );
    abstract function updateData( $query );
    abstract  function delete( $query );
} 
?>