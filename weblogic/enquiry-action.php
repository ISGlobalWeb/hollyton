<?php
//submitting enquiry into database
$submitContactId=Functions :: submitEnquiryForm($columnName,$columnValue,TBL_ENQUIRY);
echo $submitContactId;
if( ($spam_id == "0") || ($spam_id == "1") ){
	//Calling funtion to send emails to admin(info@brlets.co.uk)
	Functions :: mailEnquiriesSuccess($submitContactId, TBL_ENQUIRY, $formName, $messageBody, $mailSubject, $subjectPPC, $email, $date);
}else{
	//Calling funtion to send spam emails to isgloalweb support(spam@isglobalweb.com)
	Functions :: mailEnquiriesSpam($submitContactId, TBL_ENQUIRY, $formName, $messageBody, $mailSubject, $subjectPPC, $email, $date);
}
?>