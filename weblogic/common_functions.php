<?php
	include_once ROOT_PATH . "/weblogic/logutil.php";
	include_once ROOT_PATH . "/weblogic/dbutil.php";
	
	class Common_Functions {
		
		public static function insertContactUsDetails($dbUtil, $title, $name, $email, $contact, $subject, $price_range, $bedrooms, $message, $submitdate) {
	    	$uniqueContactUsId = NULL;
			LogUtil :: debug("insertContactUsEnquiry: insert the property details in Db- title:" . $title . ", name:" . $name . ", email: " . $email . ", contact: " . $contact . ", subject: " . $subject . ", price_range: " . $price_range . ", bedrooms: " . $bedrooms . ", message: " . $message . ", submitdate: " . $submitdate);
			
			if(!empty($title) && !empty($name) && !empty($email) && !empty($message) && !empty($submitdate)) {
				//insert contact us details
				$insert_contactus_sql = "INSERT INTO contactus (title, name, email, contact, subject, price_range, bedrooms, message, submitdate) " .
											 "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$statement = $dbUtil->prepare($insert_contactus_sql);
				$statement->execute(array($title, $name, $email, $contact, $subject, $price_range, $bedrooms, $message, $submitdate));
				$uniqueContactUsId = $dbUtil->pk();
				
				LogUtil :: debug("insertContactUsEnquiry: contact us enquiry insert done successfully, commiting the transaction. Unique Id". $uniqueContactUsId);
			} else {
				LogUtil :: debug("insertContactUsEnquiry: title, name, email, message, date are required for inserting contact us enquiry");
				$uniqueContactUsId = NULL;
			}
			return $uniqueContactUsId;
	    }
		
		
		/*Insert Payee Details Code Starts Here*/
		public static function insertPayee($dbUtil, $negotiator_id, $payee_username, $payee_password, $payee_fname, $payee_sname, $property_address, $payment_type, $amount, $payment_method, $payee_email, $payee_telephone, $branch, $reoccuring, $submitdate, $ip, $order_no, $amount_due, $pay_through, $taken_by) {
	    	$uniquePayeeId = NULL;
			LogUtil :: debug("insertPayee: insert the authentication in Db- username:" . $payee_username . ", property_address:" . $property_address . ", payment_type: " . $payment_type);
			if(!empty($payee_fname) && !empty($amount) && !empty($submitdate)) {
				//insert authentication details
				$insert_payee_sql = "INSERT INTO ".TBL_BRPAYMENTS_PAYEE." (negotiator_id, payee_username, payee_password, payee_fname, payee_sname, property_address, payment_type, amount, payment_method, payee_email, payee_telephone, branch, reoccuring, date, ip, order_no, amount_due, pay_through, taken_by, active) " .
									  "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$statement = $dbUtil->prepare($insert_payee_sql);
				$statement->execute(array($negotiator_id, $payee_username, $payee_password, $payee_fname, $payee_sname, $property_address, $payment_type, $amount, $payment_method, $payee_email, $payee_telephone, $branch, $reoccuring, $submitdate, $ip, $order_no, $amount_due, $pay_through, $taken_by, 'Yes'));
				$uniquePayeeId = $dbUtil->pk();
				LogUtil :: debug("insertPayee: inserted authetication in Db: " . $uniquePayeeId);
			} else {
				LogUtil :: debug("insertPayee: payee_fname, amount, date are required for inserting authentication.");
				$uniquePayeeId = NULL;
			}
			return $uniquePayeeId;
	    }
		/*Insert Payee Details Code Starts Here*/
		
		/*Update Payee Details Code Starts Here*/
		public static function updatePayee($dbUtil, $payee_id, $negotiator_id, $payee_username, $payee_fname, $payee_sname, $property_address, $payment_type, $amount, $payment_method, $payee_email, $payee_telephone, $branch, $reoccuring, $submitdate, $ip, $order_no, $amount_due, $pay_through, $taken_by) {
	    	$uniquePayeeId = NULL;
			LogUtil :: debug("updatePayee: insert the authentication in Db- username:" . $payee_username . ", property_address:" . $property_address . ", payment_type: " . $payment_type);
			if(!empty($payee_id)) {
				//insert authentication details
				$update_payee_sql = "UPDATE ".TBL_BRPAYMENTS_PAYEE." SET payee_username = ?, payee_fname = ?, payee_sname = ?, property_address = ?, payment_type = ?, amount = ?, payment_method = ?, payee_email = ?, payee_telephone = ?, branch = ?, reoccuring = ?, date = ?, ip = ?, order_no = ?, amount_due = ?, pay_through = ?, taken_by = ?, active = ? WHERE id = ?";
				$statement = $dbUtil->prepare($update_payee_sql);
				$statement->execute(array($payee_username, $payee_fname, $payee_sname, $property_address, $payment_type, $amount, $payment_method, $payee_email, $payee_telephone, $branch, $reoccuring, $submitdate, $ip, $order_no, $amount_due, $pay_through, $taken_by, 'Yes', $payee_id));
				$uniquePayeeId = $payee_id;
				LogUtil :: debug("updatePayee: inserted authetication in Db: " . $uniquePayeeId);
			} else {
				LogUtil :: debug("updatePayee: payee_name, amount, date are required for inserting authentication.");
				$uniquePayeeId = NULL;
			}
			return $uniquePayeeId;
	    }
		/*Update Payee Details Code Starts Here*/
		
		
		/*Insert Negotiator Details Code Starts Here*/
		public static function insertNegotiatorDetails($dbUtil, $neg_name, $neg_branch, $neg_email, $neg_username, $neg_password, $date, $ip) {
	    	$uniqueNegotiatorId = NULL;
			LogUtil :: debug("insertNegotiator: insert the authentication in Db- username:" . $neg_username . ", neg_password:" . $neg_password . ", neg_name: " . $neg_name);
			if(!empty($neg_name) && !empty($neg_email) && !empty($neg_username)) {
				//insert authentication details
				$insert_neg_sql = "INSERT INTO ".TBL_BRPAYMENTS_NEGOTIATOR." (ad_name, ad_branch, ad_username, ad_password, ad_email, date, ip)" .
									  "VALUES (?, ?, ?, ?, ?, ?, ?)";
				$statement = $dbUtil->prepare($insert_neg_sql);
				$statement->execute(array($neg_name, $neg_branch, $neg_username, $neg_password, $neg_email, $date, $ip));
				$uniqueNegotiatorId = $dbUtil->pk();
				LogUtil :: debug("insertNegotiator: inserted authetication in Db: " . $uniqueNegotiatorId);
			} else {
				LogUtil :: debug("insertNegotiator: neg_name, neg_email, neg_username are required for inserting authentication.");
				$uniqueNegotiatorId = NULL;
			}
			return $uniqueNegotiatorId;
	    }
		/*Insert Negotiator Details Code Starts Here*/
		
		
		/*Insert Negotiator Details Code Starts Here*/
		public static function submitEnquiry($dbUtil, $columnName, $columnValue, $tableName) {
			
			
			foreach($columnName as $column){
				$showColumn .= $column;
				$showColumn .= ",";
				
				$showMark .= '?';
				$showMark .= ',';
			}
			$showColumn = rtrim($showColumn, ",");
			$showMark = rtrim($showMark, ",");
			
			LogUtil :: debug("submitEnquiry: insert the enquiry in Db- columnName:" . $columnName . ", columnValue:" . $columnValue);
			if(!empty($columnName) && !empty($columnValue)) {
				
				//insert authentication details
				$insert_enq_sql = "INSERT INTO $tableName ($showColumn)" .
									  "VALUES ($showMark)";
				$statement = $dbUtil->prepare($insert_enq_sql);
				$statement->execute($columnValue);
				$uniqueEnquiryId = $dbUtil->pk();
				LogUtil :: debug("submitEnquiry: inserted authetication in Db: " . $uniqueEnquiryId);
			} else {
				LogUtil :: debug("submitEnquiry: columnName, columnValue are required for inserting authentication.");
				$uniqueEnquiryId = NULL;
			}
			return $uniqueEnquiryId;
	    }
		/*Insert Negotiator Details Code Starts Here*/
		
		/*Code for count no. of records in any query Starts Here*/
		public static function countQuery($sql){
			$totalProperty = "";
			if(!empty($sql)) {
				LogUtil :: debug("gettingQueryRun:  getting query: " . $sql);
				$dbUtil = NULL;
				try {
					$dbUtil = new DbUtil();
					$enable = "no";
					$totalProperty = array();
					$stmts = $dbUtil->prepare($sql);
					$rows = $stmts->execute(array());
					$totalProperty = $stmts->rowCount();

					$dbUtil->commit();

				} catch (Exception $e) {
					LogUtil :: error("gettingQueryRun: Error while fetching property type for:  $enable, Error: $e");
					LogUtil :: debug("gettingQueryRun: rolling back transaction");
					if(!empty($dbUtil)) {
						/*** roll back the transaction if we fail ***/
						$dbUtil->rollback();
					}
				}
			} else {
				LogUtil :: debug("gettingQueryRun: the query is NULL or blank- " . $enable);
			}
			LogUtil :: debug("gettingQueryRun: query for (" . $enable . "): " . print_r($totalProperty, 1));
			return $totalProperty;
		}
		/*Code for count no. of records in any query Ends Here*/
		
		/*Code for fetching records from any query Starts Here*/

		public static function fetchQuery($sql, $column){
			$records = "";
			if(!empty($sql)) {
				LogUtil :: debug("fetchQuery:  getting query: " . $sql. " . ".$column);
				$dbUtil = NULL;
				try {
					$dbUtil = new DbUtil();
					$enable = "no";
					$records = array();
					$stmt = $dbUtil->prepare($sql);
					$stmt->execute(array());
					while ($row = $stmt->fetch()) {
						array_push($records, $row[$column]);
					}
					$dbUtil->commit();
				} catch (Exception $e) {
					LogUtil :: error("gettingQueryRun: Error while fetching property type for:  $enable, Error: $e");
					LogUtil :: debug("gettingQueryRun: rolling back transaction");
					if(!empty($dbUtil)) {
						/*** roll back the transaction if we fail ***/
						$dbUtil->rollback();
					}
				}
			} else {
				LogUtil :: debug("gettingQueryRun: the query is NULL or blank- " . $enable);
			}
			LogUtil :: debug("gettingQueryRun: query for (" . $enable . "): " . print_r($records, 1));
			return $records;
		}
		/*Code for fetching records from any query Ends Here*/
		
		/*Code for fetching records from any query Starts Here*/

		public static function runQuery($sql)	{
			$checkQuery = "";
			if(!empty($sql)) {
				LogUtil :: debug("fetchQuery:  getting query: " . $sql);
				$dbUtil = NULL;
				try {
					$dbUtil = new DbUtil();
					$stmt = $dbUtil->prepare($sql);
					$stmt->execute(array());
					$checkQuery = "success";
					$dbUtil->commit();
	
				} catch (Exception $e) {
					LogUtil :: error("gettingQueryRun: Error while fetching property type for:  $enable, Error: $e");
					LogUtil :: debug("gettingQueryRun: rolling back transaction");
					if(!empty($dbUtil)) {
						/*** roll back the transaction if we fail ***/
						$dbUtil->rollback();
					}
				}
			} else {
				LogUtil :: debug("gettingQueryRun: the query is NULL or blank- " . $checkQuery);
			}
			LogUtil :: debug("gettingQueryRun: query for (" . $checkQuery . "): " . print_r($sql, 1));
	
			return $checkQuery;
		}
		/*Code for fetching records from any query Ends Here*/

		/*Code for Execute any query and return value Starts Here*/
		public static function executeQuery($sql,$columns)	{
			$records = array();
			$columns = explode(',',$columns);
			if(!empty($sql)) {
				LogUtil :: debug("fetchQuery:  getting query: " . $sql);
				$dbUtil = NULL;
				try {
					$dbUtil = new DbUtil();
					$stmt = $dbUtil->prepare($sql);
					$stmt->execute(array());
					while ($row = $stmt->fetch()) {
						$value=new QueryObj();
						$value->setVal1($row[$columns[0]]);	
						$value->setVal2($row[$columns[1]]);	
						$value->setVal3($row[$columns[2]]);	
						$value->setVal4($row[$columns[3]]);	
						$value->setVal5($row[$columns[4]]);	
						$value->setVal6($row[$columns[5]]);	
						$value->setVal7($row[$columns[6]]);	
						$value->setVal8($row[$columns[7]]);	
						$value->setVal9($row[$columns[8]]);	
						$value->setVal10($row[$columns[9]]);	

						array_push($records, $value);
					}
					$dbUtil->commit();
	
				} catch (Exception $e) {
					LogUtil :: error("gettingQueryRun: Error while fetching property type for:  $enable, Error: $e");
					LogUtil :: debug("gettingQueryRun: rolling back transaction");
					if(!empty($dbUtil)) {
						/*** roll back the transaction if we fail ***/
						$dbUtil->rollback();
					}
				}
			} else {
				LogUtil :: debug("gettingQueryRun: the query is NULL or blank- " . $checkQuery);
			}
			LogUtil :: debug("gettingQueryRun: query for (" . $checkQuery . "): " . print_r($sql, 1));
	
			return $records;
		}
		/*Code for Execute any query and return value Ends Here*/
		
		/*Getting List of Tube Staions, Code Starts Here*/
		public static function getListOfTubeStations($status) {
			LogUtil :: debug("getListOfTubeStations: getting property location list- ". $status);
			$TubeList = array();
			if(!empty($status)) {
				LogUtil :: debug("getListOfTubeStations: fetching location list from Db: " . $status);
				$dbUtil = NULL;
				try {
					$dbUtil = new DbUtil();
					
					$sql = "select * FROM ".TBL_TUBE_STATION."";
					$stmt = $dbUtil->prepare($sql);
					$stmt->execute(array());
					while ($row = $stmt->fetch()) {
					
						$tube=new TubeListObj();
						$tube->setStationName($row['station_name']);
						$tube->setLat($row['latitude']);
						$tube->setLng($row['longitude']);
						$tube->setLine($row['line']);
				
						array_push($TubeList, $tube);
					}
					$dbUtil->commit();

				} catch (Exception $e) {
					LogUtil :: error("getListOfTubeStations: Error while fetching property type for:  $enable, Error: $e");
					LogUtil :: debug("getListOfTubeStations: rolling back transaction");

					if(!empty($dbUtil)) {
						/*** roll back the transaction if we fail ***/
						$dbUtil->rollback();
					}
				}
			} else {
				LogUtil :: debug("getListOfTubeStations: the locations status is NULL or blank- " . $status);
			}
			LogUtil :: debug("getListOfTubeStations: ptype for (" . $status . "): " . print_r($TubeList, 1));
			return $TubeList;
		}
		/*Getting List of Tube Staions, Code Ends Here*/
		
		
		
		/*Getting Combined List of Name and Distance, Code Starts Here*/
		function combinedNameDistanceList($NameList, $DistanceList) {
			$count = 1;
			$ListArray = explode(",",rtrim($NameList,","));
			$DistanceListArray = explode(",",rtrim($DistanceList,","));
			
			$ArrayCombine = array_combine($ListArray,$DistanceListArray);
			uasort($ArrayCombine, 'cmp');
			
			return $ArrayCombine;
		}
		/*Getting Combined List of Tube Stions, Code Ends Here*/
		
		/*Getting Distance from 2 locations, Code Starts Here*/
		function distance($lat1, $lon1, $lat2, $lon2, $unit) {
			$theta = $lon1 - $lon2;
			$dist = sin(@deg2rad($lat1)) * sin(@deg2rad($lat2)) +  cos(@deg2rad($lat1)) * cos(@deg2rad($lat2)) * cos(@deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
			$unit = strtoupper($unit);
	
			if ($unit == "K") {
				return ($miles * 1.609344);
			} else if ($unit == "N") {
				return ($miles * 0.8684);
			} else {
				return $miles;
			}
		}
		/*Getting Distance from 2 locations, Code Ends Here*/
		
		/*Getting Currency Sign, Code Starts Here*/
		function getCurrencySign($currency){
			if($currency=="usd"){
				$curencySign = "$";
				$currencyActiveUSD = "curr-active";
			}elseif($currency=="eur"){
				$curencySign = "&euro;";
				$currencyActiveEUR = "curr-active";
			}else{
				$curencySign = "&pound;";
				$currencyActiveGBP = "curr-active";
			}
			return $curencySign;
		}
		/*Getting Currency Sign, Code Ends Here*/
		
		/*Currency Converter Code starts here*/
		function ConverCurrency($amount,$from_Currency,$to_Currency){
			$amount = urlencode($amount);
			$from_Currency = urlencode($from_Currency);
			$to_Currency = urlencode($to_Currency);

			$url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";

			$ch = curl_init();
			$timeout = 0;
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$rawdata = curl_exec($ch);
			curl_close($ch);
			$data = explode('bld>', $rawdata);
			$data = explode($to_Currency, $data[1]);
			return round($data[0], 2);
			//$price = preg_replace('_^\D+|\D+$_', "", $rhs);
			//return number_format($price, 2, '.', ',');
			//return $price;
		}
		/*Currency Converter Code ends here*/
	
	
		//Getting Latitude and Longitude - code starts here
		function getMapAddress($address){
			$mapAddress = NULL;
			if($address){
				$mapAddress = array();
				$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
				$json = json_decode($json);

				$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
				$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

				array_push($mapAddress, $lat);
				array_push($mapAddress, $long);

				return $mapAddress;
			}else{
				return $mapAddress;
			}	
		}
		//Getting Latitude and Longitude - code ends here
	
	
		//Checking for spam - (hidden field), code starts here
		public static function checkforSpam($str){
			if (!empty($str)){
				$hiddenField = $str;
			}else{
				$hiddenField = NULL;
			}
			return $hiddenField;
		}
		//Checking for spam - (hidden field), code ends here

	    //Checking for url in message, code starts here
		public static function checkMessage($str){
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			if(preg_match($reg_exUrl, $str)) {
				$spam = 4;//is spam
			}else{
				$spam = 1;//not spam
			}
			return $spam;
		}
		//Checking for url in message, code ends here

	

		//Checking for PPC, code starts here
		public static function checkPPC($ppc){
			if (!empty($ppc)){
				$source = $ppc;
				$subjectPPC = " - ".$source;
				$fetchppc = "\nSource: $source";
			}else{
				$source = "From Others";
			}
			return $source;
		}
		//Checking for PPC, code ends here
	
		public static function getFormatedText($val){
			$text = NULL;
			$text = trim($val);
			$text = str_replace("-"," ",$text);
			$text = stripslashes($text);
			$text = ucwords($text);
			return $text;
		}
		
		public static function getBedValue($val){
			$text = @trim(strtolower($val));
			$text = @explode("-bed",$val);
			$text = $text[0];
			return $text;
		}
		
		public static function redirect301($url){
			@header( "HTTP/1.1 301 Moved Permanently" );
			@header("Location:".$url);
			exit;
		}
	
		public static function notFound404(){
			@header('HTTP/1.0 404 Not Found');
			include "404.php";
			exit;
		}
		
		public static function getUrlTextWithUnderscore($val){
			$text = trim($val);
			$text = str_replace(" ","_",$text);
			return $text;
		}

		public static function getUrlText($val){
			$text = trim($val);
			$text = str_replace(" ","-",$text);
			$text = strtolower($text);
			return $text;
		}
	}