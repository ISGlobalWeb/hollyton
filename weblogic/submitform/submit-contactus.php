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
		
		$lastUserId = Common_Functions :: submitForm($columnName,$columnValue,TBL_CONTACTUS);

		if($lastUserId){
			$formName = 'Contact Us';
			$template = 'contactus-admin.html,contactus-user.html';
			
			$messageBody = '<tr>
    							<td bgcolor="#f3f2dd">Name :</td>
    							<td bgcolor="#f3f2dd">'.$title.' '.$fname.' '.$sname.'</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">Email :</td>
								<td bgcolor="#FFFFFF">'.$email.'</td>
							</tr>
							<tr>
								<td bgcolor="#f3f2dd">Phone :</td>
								<td bgcolor="#f3f2dd">'.$phone.'</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">Comments :</td>
								<td bgcolor="#FFFFFF">'.$comment.'</td>
							</tr>';
			
			//sending mail to amdin and user
			$successMail = Common_Functions :: sendMail($lastUserId, $messageBody, $formName, $email, $datetime, $template);
			
			@header('Location:'.GLOBAL_PATH.'/thanks/success-contactus/');
			exit();
		}
	}
}
?>