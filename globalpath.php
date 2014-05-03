<?php
if($_SERVER['REMOTE_ADDR'] == '::1'){
	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'/git-projects/hollyton');
	DEFINE('GLOBAL_PATH','http://localhost/git-projects/hollyton');
}else{
	DEFINE('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'');
	DEFINE('GLOBAL_PATH','http://www.hollyton.co.uk');
}
$getUrl = str_replace('/git-projects/hollyton','',$_SERVER['REQUEST_URI']);

DEFINE('SUBMITFORM_PATH','weblogic/submitform');//submit form path

DEFINE('CONTACT_NO','020 745 6789');//sales email id for sending email
DEFINE('SALES_EMAIL_ID','sales@hollyton.co.uk');//sales email id for sending email
DEFINE('INFO_EMAIL_ID','sid.style027@gmail.com');//info email id for sending email
DEFINE('TBL_CONTACTUS','contactus');//contact us table
?>