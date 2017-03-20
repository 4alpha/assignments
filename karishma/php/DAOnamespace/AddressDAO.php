<?php
namespace DAOnamespace;
use DBnamespace\DBconnection;
use MyException\FetchRecordException as fetch;
use MyException\InsertRecordException as insert;
use MyException\UpdateRecordException as update;
use MyException\DeleteRecordException as delete;

 class AddressDAO implements DAO {
    private $address, $db_object;

    function __construct( $address ) {
        $this->address = $address;
        $this->db_object = \DBnamespace\DBconnection::getConnection();
    }

    function getRow() {
        $query = "SELECT * FROM Address";
        try {
            $result = $this->db_object->getRow( $query );
            return $result;
        }  catch( fetch $e ) {
            return $e->getRowException()."query status :";
        }
    }

    function addData( $address ) {
        $query ="INSERT INTO Address VALUES( $address->pinCode, '$address->localAddress');";
        try {
            $result = $this->db_object->addData( $query );
            return $result;
        }  catch(insert $e) {
            return $e->addException()."query status :".pg_result_status($result);
        }
    }

    function updateData($address) {
        $query = "UPDATE Address SET pin_code = '$address->pinCode', addr = '$address->localAddress' WHERE pin_code ='$address->pinCode';";
        try {
            $result = $this->db_object->updateData( $query );
            return $result;
        } catch( update $e ) {
            return $e->updateDataException()."query status :".pg_result_status($result)."<br> ";
        }
    }

    function delete($pinCode) {
        $query = "DELETE FROM Address WHERE pin_code = $pinCode;";
        try {
            $result = $this->db_object->delete( $query );
            return $result;
        } catch( delete $e ) {
            return $e-> deleteException();
        }
    }
}
?>
