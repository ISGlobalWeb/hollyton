<?php
include_once ROOT_PATH . "/weblogic/dbutil.php";
include_once ROOT_PATH . "/weblogic/obj.php";

class Functions {

	/*Submit Form, Code Starts Here*/
	public static function submitForm($columnName,$columnValue,$tableName) {
		if(!empty($columnValue)) {
			try {
				
				
				$dbUtil = new DbUtil();

				foreach($columnName as $column){
					$showColumn .= $column;
					$showColumn .= ",";
				
					$showMark .= '?';
					$showMark .= ',';
				}
				$showColumn = rtrim($showColumn, ",");
				$showMark = rtrim($showMark, ",");
				
				if(!empty($columnName) && !empty($columnValue)) {
					$insert_enq_sql = "INSERT INTO $tableName ($showColumn)" . "VALUES ($showMark)";
					$statement = $dbUtil->prepare($insert_enq_sql);
					$statement->execute($columnValue);
					$uniqueEnquiryId = $dbUtil->pk();
				} else {
					$uniqueEnquiryId = NULL;
				}
				$submit_id = $uniqueEnquiryId;
				
				$dbUtil->commit();

			} catch (Exception $e) {
				if(!empty($dbUtil)) {
					/*** roll back the transaction if we fail ***/
					$dbUtil->rollback();
				}
				$submit_id = NULL;
			}
		} else {
				$isSuccess = NULL;
		}
		return $submit_id;
	}
	/*Submit Form, Code Ends Here*/
	
}
?>