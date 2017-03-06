<?php
include 'interfaceDAO.php';
class AddressDAO implements DAO {
    private $db;
    private $add;
    function __construct($db, $add) {
        $this->db = $db;
        $this->add =$add; 
    }
    function get($PIN) {
        $query = "select * from address where PIN = ".$PIN;
        return $this->db->get($query);

    }
    function getAll() {
        $query = "select * from address ORDER BY pin";
        $arr= $this->db->getAll($query);
        return $arr;
    }
    function add($add) {
        $query = "INSERT INTO address(village, tal,dist) VALUES('". $this->add->Village . "', '" . $this->add->Tal."', '".$this->add->Dist. "')";
        return pg_affected_rows( $this->db->Insert($query) );
    }
    function update($add) {
        $query = "UPDATE address SET (village, tal, dist) = ('".$this->add->Village."','".$this->add->Tal."','".$this->add->Dist."') WHERE PIN = '".$this->add->PIN."'";
        return pg_affected_rows( $this->db->Update($query) );
    }
    function delete($PIN) {
        $query = "DELETE FROM address where PIN = ".$PIN;
        return pg_affected_rows( $this->db->Delete($query) );
    }
}