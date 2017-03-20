<?php 
namespace controNamespace;
use classNamespace\Address as Address;
use  DAOnamespace\AddressDAO as AddressDAO;

class AddressController {
    private $pinCode ,$localAddress , $address, $addressDao;

    function __construct() { 
        $pinCode = $_POST['pinCode'];
        $localAddress = $_POST['localAddress'];
        $address = new Address($pinCode, $localAddress);
        $this->address = $address;
        $this->pinCode = $pinCode;
    }

   public function getRow($data) { 
        $this->addressDao = new AddressDAO( $this->address );
        $result = $this->addressDao->getRow();
        return $result;
    } 

    public function addData($data) {
        $this->addressDao = new AddressDAO($this->address);
        $result = $this->addressDao->addData($this->address);
        return $result;
    }  

    public function updateData($data) {
        $this->addressDao = new AddressDAO($this->address);
        $result = $this->addressDao->updateData($this->address);
        return $result;
    }  

    public function delete($data){
        $this->addressDao = new AddressDAO($this->address);
        $result = $this->addressDao->delete($this->pinCode);
        return $result;
    }
    
}
?>
