<?php
	include_once 'Config/Config.php';
		 $db_conn = pg_connect( "host=" . $GLOBALS['host'] . " dbname=" . $GLOBALS['dbName'] . " user=" . $GLOBALS['user'] . " password=" . $GLOBALS['password']) or die("could not connect"); 
		$query = "SELECT  * FROM department ORDER BY dept_no";

		$record = pg_query($db_conn, $query);
		$result = pg_fetch_all($record);
		$select= '<select multiple class="form-control" name="departments[]" id="departments" >';
		foreach ($result as $rs) {
			$select .= '<option value="' . $rs['dept_no'] . '_' . $rs['can_have_multi_departments'] . '">' . $rs['dept_name'] . '</option>';
		}
			$select .= '</select>';
			echo $select;
?>