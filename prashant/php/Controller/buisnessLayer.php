<?php
	function buisnessLayer() {
			$dept_length = count($_REQUEST['departments']);
			$dept_no = array();
			$multi_dept_val = array();
			$buisnessFlag = false;
			
			for($i = 0; $i < $dept_length; $i++) {
				$arr = explode('_', $_REQUEST['departments'][$i]);
				$dept_no[$i] = $arr[0];
				$multi_dept_val[$i] = $arr[1];
			}
			if($dept_length == 1) {
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
?>