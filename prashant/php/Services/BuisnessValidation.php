<?php
namespace Services;
class BuisnessValidation {

	function validDepartment($departments) {
		$flag = true;	
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
					$flag = false;
					break;
				} 
				}
				if($flag === false) {
						return $flag;
				} else {
					return $dept_no;
				}
		}
	}
}
?>