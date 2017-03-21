<?php 
namespace Controller;
use Model\Address as Address;
use  DAO\AddressDAO as AddressDAO;

class AddressController {
    private $pinCode, $address, $dao;

    function __construct() { 
        $pinCode = $_POST['pinCode'];
        $this->pinCode = $pinCode;
        $address = new Address($pinCode, $_POST['localAddress']);
        $this->address = $address;
    }

   public function getRow($data) { 
        $this->dao = new AddressDAO( $this->address );
        $result = $this->dao->getRow();
        return $result;
    } 

    public function addData($data) {
        $this->dao = new AddressDAO($this->address);
        $result = $this->dao->addData($this->address);
        return $result;
    }  

    public function updateData($data) {
        $this->dao = new AddressDAO($this->address);
        $result = $this->dao->updateData($this->address);
        return $result;
    }  

    public function delete($data){
        $this->dao = new AddressDAO($this->address);
        $result = $this->dao->delete($this->pinCode);
        return $result;
    }
    
}
?>
