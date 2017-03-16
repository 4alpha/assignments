<?php
  //ini_set('display_errors',1);
   include_once 'Config.php';
  // include_once 'DatabaseConnectionException.php';
  // include_once 'DeleteException.php';
  // include_once 'AddException.php';
  // include_once 'UpdateException.php';
  use DisplayException\DatabaseConnectionException as DatabaseConnectionException;
  use DisplayException\DeleteException as DeleteException;
  use DisplayException\AddException as AddException;
  use DisplayException\UpdateException as UpdateException;

  function __autoload($class) {
    $class = str_replace("\\","/",$class).".php";
    //print($class);
    require_once $class;
  }

 
  class PostgresDB  implements DB {
    function __construct() {
      try{
        $dbconn = pg_connect("host= ".$GLOBALS['host']." dbname= ".$GLOBALS['dbname']." user= ".$GLOBALS['user']." password= ".$GLOBALS['password']." " );
        if($dbconn == 0){ 
          throw new  DatabaseConnectionException;
        } else {
        return "Opened database through postgresdb\n<br>";
        }
      } catch( DatabaseConnectionException $e) {
        return $e->connectionDie();
      }
    }

    public function getAll($query) {
      $result = pg_query($query);
      $result1 = pg_fetch_all($result);
      return $result1;
    }

    public function add($query) {
      try{
        $result = pg_query($query);
        if($result == 0){
          throw new AddException;
        } else{
          return $result;
        }
      } catch(AddException $e) {
          return $e->idAlreadyExists();
      }
    }

    public function update($query) {
      try{
        $result = pg_query($query);
        $cmdtuples = pg_affected_rows($result);
        if($cmdtuples == false){
          throw new UpdateException;
        } else {
          return $result;
        } 
      } catch(UpdateException $e) {
        echo $e ->idDoesNotExits();
      }
    }
    
    public function delete($query) {
      try{
        $result = pg_query($query);
        $cmdtuples = pg_affected_rows($result);
        if($cmdtuples == false){
          throw new DeleteException;
        } else {
          return $result;
        } 
      } catch(DeleteException $e) {
          return $e->idDoesNotExits();
      }
    }
  }
?>