<?php
include_once ROOT_PATH . "/weblogic/dbutil.php";
	
class Common_Functions {
		
	function randString( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		$str .= rand(1,9999);
		return $str;
	}
		
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
	
	//Send Spam Mail Enquiries, code starts here
	public static function sendMail($submitId, $messageBody, $formName, $userEmail, $date, $template){

			//Mailing to User
			$MailBodyUser = file_get_contents(GLOBAL_PATH.'/assets/email-templates/'.$template.'');
			$MailBodyUser = str_replace('[%FORM_NAME%]',$formName, $MailBodyUser);
			$MailBodyUser = str_replace('[%FORM_DATA%]',$messageBody, $MailBodyUser);
			$MailBodyUser = str_replace('[%DATETIME%]',$date, $MailBodyUser);
			
			$MailSubjectUser = 'Auto Reply: Hollyton.co.uk - '.$formName;
			$headersUser = "From: <Hollyton>" . strip_tags(INFO_EMAIL_ID) . "\r\n";
			$headersUser .= "Reply-To: ". strip_tags(INFO_EMAIL_ID) . "\r\n";
			//$headersAdmin .= "CC: sid@isglobalweb.com\r\n";
			$headersUser .= "MIME-Version: 1.0\r\n";
			$headersUser .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$mailAdmin = @mail($userEmail, $MailSubjectUser, $MailBodyUser, $headersUser);
			
			return $mailAdmin;
		}
		//Send Spam Mail Enquiries, code ends here
	
	
	
	
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

	
		public static function getFormatedText($val){
			$text = NULL;
			$text = trim($val);
			$text = str_replace("-"," ",$text);
			$text = stripslashes($text);
			$text = ucwords($text);
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