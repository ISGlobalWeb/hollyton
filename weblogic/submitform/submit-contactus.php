<?php
include_once('../../globalpath.php');
include_once (ROOT_PATH.'/weblogic/header.php');

if(isset( $_POST['submitcontactus']) || isset($_POST['submitcontactus_x']))
{
	$spam = NULL;
	$hiddenField = NULL;
	$title=$_POST['title'];
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$comment = $_POST['comment'];
	
	$datetime = date('Y-m-d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];
	$ref = $_SERVER['HTTP_REFERER'];
		
	if(!$hiddenField and !$spam){
		
		//submit form
		$columnName = array('title','fname','sname','email','phone','comment','datetime','ip','ref');
		$columnValue = array($title,$fname,$sname,$email,$phone,$comment,$datetime,$ip,$ref);
		
		$lastUserId = Functions :: submitForm($columnName,$columnValue,TBL_CONTACTUS);

		if($lastUserId){
			$mailSubject = 'Contact Us - Hollyton.co.uk';
			$template = 'verify-email.html';
			Common_Functions :: sendMail($lastUserId, $messageBody, $mailSubject, $email, $datetime, $template);
		}
		@header('Location:'.GLOBAL_PATH.'/success-register.php');
		exit();
	}
}
?>