<?php
include 'interfaceDAO.php';
class AddressDAO extends DAO {
    private $db;
    private $add;
    function __construct($db, $add) {
        $this->db = DAO::makeObject();
        $this->add =$add; 
    }
    function get($pin) {
        $query = "select * from address where pin = ".$pin;
        return $this->db->executeQuery($query);

    }
    function getall() {
        $query = "select * from address ORDER BY pin";
        return $this->db->executeQuery($query);
    }
    function add($add) {
        $query = "INSERT INTO address(village, tal,dist) VALUES('". $this->add->village . "', '" . $this->add->tal."', '".$this->add->dist. "')";
        return pg_affected_rows( $this->db->executeQuery($query) );
    }
    function update($add) {
        $query = "UPDATE address SET (village, tal, dist) = ('".$this->add->village."','".$this->add->tal."','".$this->add->dist."') WHERE pin = '".$this->add->pin."'";
        return pg_affected_rows( $this->db->executeQuery($query) );
    }
    function delete($pin) {
        $query = "DELETE FROM address where pin = ".$pin;
        return pg_affected_rows( $this->db->executeQuery($query) );
    }
}