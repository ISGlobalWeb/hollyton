<?php
if($_SERVER['REMOTE_ADDR'] == '::1'){
	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'/git-projects/hollyton');
	DEFINE('GLOBAL_PATH','http://localhost/git-projects/hollyton');
	$getUrl = str_replace('/git-projects/hollyton','',$_SERVER['REQUEST_URI']);
}else{
	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'/websites/hollyton');
	DEFINE('GLOBAL_PATH','http://benham.com.dedi1544.your-server.de/websites/hollyton');
	$getUrl = str_replace('/websites/hollyton','',$_SERVER['REQUEST_URI']);
}
DEFINE('SUBMITFORM_PATH','weblogic/submitform');//submit form path

DEFINE('CONTACT_NO','020 745 6789');//sales email id for sending email
DEFINE('SALES_EMAIL_ID','sales@hollyton.co.uk');//sales email id for sending email
DEFINE('INFO_EMAIL_ID','info@hollyton.co.uk');//info email id for sending email
DEFINE('WEBTEAM_EMAIL_ID','suport@hollyton.co.uk');//info email id for sending email
DEFINE('MAIL_TO','sid@isglobalweb.com');//info email id for sending email
DEFINE('TBL_CONTACTUS','contactus');//contact us table
?>