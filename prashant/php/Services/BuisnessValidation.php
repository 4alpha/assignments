<?php
namespace Services;
class BuisnessValidation {

	function __construct() {
		// $dept_length = count($_REQUEST['departments']);
		
	}

	function validDepartment($departments) {
						
			for($i = 0; $i < count($departments); $i++) {
				$arr = explode('_', $departments[$i]);
				$dept_no[$i] = $arr[0];
				$multi_dept_val[$i] = $arr[1];
			}
			if(count($departments) == 1) {
				return $dept_no;
			} else {
				for($i = 0; $i < count($multi_dept_val); $i++) {
					if($multi_dept_val[$i] == 'f') {
						return false;
						break;
					} else {
						return $dept_no;
					}			
				}
				
		}
}
}
?>