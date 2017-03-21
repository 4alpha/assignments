<?php
namespace DAO;

use DataBase\DBconnection;
use DataBaseException\FetchRecordException as FetchRecordException;
use DataBaseException\InsertRecordException as InsertRecordException;
use DataBaseException\UpdateRecordException as UpdateRecordException;
use DataBaseException\DeleteRecordException as DeleteRecordException;

 class AddressDAO implements DAO {
    private $address, $db;

    function __construct( $address ) {
        $this->address = $address;
        $this->db = \DataBase\DBconnection::getConnection();
    }

    function getRow() {
        $query = "SELECT * FROM Address";
        try {
            $result = $this->db->getRow( $query );
            return $result;
        }  catch( FetchRecordException $e ) {
            return $e->getRowException()."query status :";
        }
    }

    function addData( $address ) {
        $query ="INSERT INTO Address VALUES( $address->pinCode, '$address->localAddress');";
        try {
            $result = $this->db->addData( $query );
            return $result;
        }  catch(InsertRecordException $e) {
            return $e->addException()."query status :".pg_result_status($result);
        }
    }

    function updateData($address) {
        $query = "UPDATE Address SET pin_code = '$address->pinCode', addr = '$address->localAddress' WHERE pin_code ='$address->pinCode';";
        try {
            $result = $this->db->updateData( $query );
            return $result;
        } catch( UpdateRecordException $e ) {
            return $e->updateDataException()."query status :".pg_result_status($result)."<br> ";
        }
    }

    function delete($pinCode) {
        $query = "DELETE FROM Address WHERE pin_code = $pinCode;";
        try {
            $result = $this->db->delete( $query );
            return $result;
        } catch( DeleteRecordException $e ) {
            return $e-> deleteException();
        }
    }
}
?>
