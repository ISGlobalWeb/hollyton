<?php
if($_SERVER['HTTP_HOST'] == 'localhost')://on localhost

	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'/git-projects/hollyton');
	DEFINE('GLOBAL_PATH','http://localhost/git-projects/hollyton');
	$getUrl = str_replace('/git-projects/hollyton','',$_SERVER['REQUEST_URI']);
	DEFINE('MAIL_TO','sid.style027@gmail.com');//info email id for sending email
	
elseif($_SERVER['HTTP_HOST'] == 'benham.com.dedi1544.your-server.de')://on german server

	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'websites/hollyton/');
	DEFINE('GLOBAL_PATH','http://benham.com.dedi1544.your-server.de/websites/hollyton');
	$getUrl = str_replace('/websites/hollyton','',$_SERVER['REQUEST_URI']);
	DEFINE('MAIL_TO','sid.style027@gmail.com');//info email id for sending email
	
else://online hollyton.co.uk

	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'');
	DEFINE('GLOBAL_PATH','http://www.hollyton.co.uk');
	$getUrl = str_replace('','',$_SERVER['REQUEST_URI']);
	DEFINE('MAIL_TO','info@hollyton.co.uk, marc@brlets.co.uk');//info email id for sending email
	
endif;

//defining some global path
DEFINE('SUBMITFORM_PATH','weblogic/submitform');//submit form path

DEFINE('CONTACT_NO','+44 (0)20 7294 7722');//sales email id for sending email
DEFINE('SALES_EMAIL_ID','sales@hollyton.co.uk');//sales email id for sending email
DEFINE('INFO_EMAIL_ID','info@hollyton.co.uk');//info email id for sending email
DEFINE('WEBTEAM_EMAIL_ID','suport@hollyton.co.uk');//info email id for sending email

DEFINE('TBL_CONTACTUS','contactus');//contact us table
?>