<?php 
namespace Controller;
use Model\Address as Address;
use  DAO\AddressDAO as AddressDAO;

class AddressController {
    private $pinCode, $address, $dao;

    function __construct() { 
      
    }

   public function getRow() {   
        $this->dao = new AddressDAO( $this->address );
        $result = $this->dao->getRow();
        return $result;
    } 

    public function addData($data) {   
        $address = new Address( $data['pinCode'],$data['localAddress']);
        $this->dao = new AddressDAO($address);
        $result = $this->dao->addData($address);
        return $result;
    }  

    public function updateData($data) {
        $address = new Address( $data['pinCode'],$data['localAddress']);
        $this->dao = new AddressDAO($address);
        $result = $this->dao->updateData($address);
        return $result;
    }  

    public function delete($data){ 
        $pinCode = $data['pin_code'];
        $this->dao = new AddressDAO($this->address);
        $result = $this->dao->delete($pinCode);
        return $result;
    }
    
}
?>
