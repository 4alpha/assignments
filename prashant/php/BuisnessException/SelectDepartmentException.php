<?php 
namespace BuisnessException;

	class SelectDepartmentException extends \Exception {
			public function errorMessage() {
				$errorMsg = " You can not select multiple Departments with Facility department";
				return $errorMsg;
			}
	}
?>	