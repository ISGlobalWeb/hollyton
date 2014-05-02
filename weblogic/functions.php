<?php
include_once ROOT_PATH . "/weblogic/logutil.php";
include_once ROOT_PATH . "/weblogic/dbutil.php";
include_once ROOT_PATH . "/weblogic/obj.php";

class Functions {

	/*Getting List of Categories, Code Starts Here*/
	public static function getCatList($status) {
		LogUtil :: debug("getCatList: getting category list- " . $status);
		$CatList = array();
		if(!empty($status)) {
			LogUtil :: debug("getCatList: fetching category list from Db: " . $status);
			$dbUtil = NULL;
			try {
				$dbUtil = new DbUtil();
				
				$sql = "select id, category FROM ".TBL_CAT." where status = ? order by category";
				$stmt = $dbUtil->prepare($sql);
				$stmt->execute(array($status));
				while ($row = $stmt->fetch()) {
					
					$category=new CatListObj();
					$category->setCatId($row['id']);
   			 		$category->setCatName($row['category']);
					
					array_push($CatList, $category);
				}

				$dbUtil->commit();

			} catch (Exception $e) {
				LogUtil :: error("getCatList: Error while fetching category for satus:  $status, Error: $e");
				LogUtil :: debug("getCatList: rolling back transaction");

				if(!empty($dbUtil)) {
					/*** roll back the transaction if we fail ***/
					$dbUtil->rollback();
				}
			}
		} else {
			LogUtil :: debug("getCatList: the category status is NULL or blank- " . $status);
		}
		LogUtil :: debug("getCatList: status for (" . $status . "): " . print_r($CatList, 1));
		return $CatList;
	}
	/*Getting List of Categories, Code Starts Here*/
	
	
	/*Getting List of Sub-Categories, Code Starts Here*/
	public static function getSubCatList($catId) {
		LogUtil :: debug("getSubCatList: getting category list- " . $catId);
		$SubCatList = array();
		if(!empty($catId)) {
			LogUtil :: debug("getSubCatList: fetching category list from Db: " . $catId);
			$dbUtil = NULL;
			try {
				$dbUtil = new DbUtil();
				
				$sql = "select subCategory FROM ".TBL_SUBCAT." where catId = ? order by subCategory";
				$stmt = $dbUtil->prepare($sql);
				$stmt->execute(array($catId));
				while ($row = $stmt->fetch()) {
					
					$subcategory=new SubCatListObj();
					$subcategory->setSubCatId($row['id']);
   			 		$subcategory->setSubCatName($row['subCategory']);
					
					array_push($SubCatList, $subcategory);
				}

				$dbUtil->commit();

			} catch (Exception $e) {
				LogUtil :: error("subCategory: Error while fetching subcategory for catId:  $catId, Error: $e");
				LogUtil :: debug("subCategory: rolling back transaction");

				if(!empty($dbUtil)) {
					/*** roll back the transaction if we fail ***/
					$dbUtil->rollback();
				}
			}
		} else {
			LogUtil :: debug("subCategory: the subcategory Id is NULL or blank- " . $catId);
		}
		LogUtil :: debug("subCategory: status for (" . $catId . "): " . print_r($SubCatList, 1));
		return $SubCatList;
	}
	/*Getting List of Sub-Categories, Code Starts Here*/
	
	
	/*Submit Form, Code Starts Here*/
	public static function submitForm($columnName,$columnValue,$tableName) {
		LogUtil :: debug("submitForm: insert the property in Db: " . print_r($columnName,1));
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
					LogUtil :: debug("submitForm: inserted successfully in Db: " . $uniqueEnquiryId);
				} else {
					LogUtil :: debug("submitForm: columnName, columnValue are required for inserting authentication.");
					$uniqueEnquiryId = NULL;
				}
				
				$submit_id = $uniqueEnquiryId;
				
				LogUtil :: debug("submitForm: got the enquiry details uniqueId: " . $submit_id);
				LogUtil :: debug("submitForm: all inserts done successfully, commiting the transaction");
				$dbUtil->commit();

			} catch (Exception $e) {
				LogUtil :: error("submitForm: Error while inserting the enquiry in Db : " . print_r($columnName, 1) . ", Error: " . $e);
				LogUtil :: debug("submitEnquiryForm: rolling back transaction for insert property.");
				if(!empty($dbUtil)) {
					/*** roll back the transaction if we fail ***/
					$dbUtil->rollback();
				}
				$submit_id = NULL;
			}
		} else {
			LogUtil :: debug("submitForm: cannot insert null property object.");
				$isSuccess = NULL;
		}
		return $submit_id;
	}
	/*Submit Form, Code Ends Here*/
	
	/*Update Table, Code Starts Here*/
	public static function updateEnquiryForm($columnName,$columnValue,$tableName,$whereCondition) {
		
		LogUtil :: debug("updateEnquiryForm: insert the property in Db: ");
		$isValid = NULL;
		if(!empty($columnValue)) {
			try {
				$dbUtil = new DbUtil();
				$i=0;
				foreach($columnName as $column){
					$showColumn .= $column."='".$columnValue[$i]."'";
					$showColumn .= ", ";
					$i=$i+1;
				}
				$showColumn = rtrim($showColumn,', ');
				//update details
				$update_enq_sql = "UPDATE $tableName set $showColumn $whereCondition";
				$statement = $dbUtil->prepare($update_enq_sql);
				$statement->execute();
				$isValid = '1';
				LogUtil :: debug("updateEnquiryForm: got the enquiry details isValid: " . $isValid);
				LogUtil :: debug("updateEnquiryForm: all inserts done successfully, commiting the transaction");
				$dbUtil->commit();

			} catch (Exception $e) {
				LogUtil :: error("updateEnquiryForm: Error while inserting the enquiry in Db : " . print_r($columnName, 1) . ", Error: " . $e);
				LogUtil :: debug("updateEnquiryForm: rolling back transaction for insert property.");
				if(!empty($dbUtil)) {
					/*** roll back the transaction if we fail ***/
					$dbUtil->rollback();
				}
				$isValid = NULL;
			}
		} else {
			LogUtil :: debug("submitEnquiryForm: cannot insert null property object.");
			$isSuccess = NULL;
		}
		return $isValid;
	}
	/*Update Table, Code Ends Here*/
	
}
?>