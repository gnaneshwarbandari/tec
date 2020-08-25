<?php

if(isset($_POST['c_name']) && isset($_POST['c_email']) && isset($_POST['c_message'])){

		$name    = $_POST['c_name']; 
    	$from1    = $_POST['c_email'];
    	$message = $_POST['c_message'];
		$from= "webpage@theelectronixclub.org";
		
// Replace sender@example.com with your "From" address. 
// This address must be verified with Amazon SES.
define('SENDER', $from); 
//define('SENDER1', 'kumaruday691@gmail.com');       

// Replace recipient@example.com with a "To" address. If your account 
// is still in the sandbox, this address must be verified.
define('RECIPIENT', 'theelectronixclub@gmail.com');  
//define('RECIPIENT1', $from1); 
                                                      
// Replace smtp_username with your Amazon SES SMTP user name.
define('USERNAME','AKIAJUSL2JDTDHTJKRMQ');  

// Replace smtp_password with your Amazon SES SMTP password.
define('PASSWORD','AghCLDJYuT3HXaSux1BJhNuVaSDuuBa8boPQo+jqBzbZ');  

// If you're using Amazon SES in a region other than US West (Oregon), 
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
// endpoint in the appropriate region.
define('HOST', 'email-smtp.us-west-2.amazonaws.com');  

 // The port you will connect to on the Amazon SES SMTP endpoint.
define('PORT', '587');     

// Other message information                                               
define('SUBJECT',"WebMail from ${name}");
define('BODY',"${from1} says ${message}");

//define('SUBJECT1',"Thank you for your Feedback !");
//define('BODY1',"Dear ${name}, Thanks a lot for your feedback. I will read/answer to your mail as early as possible.");

require_once 'Mail.php';

$headers = array (
  'From' => SENDER,
  'To' => RECIPIENT,
  'Subject' => SUBJECT);



$smtpParams = array (
  'host' => HOST,
  'port' => PORT,
  'auth' => true,
  'username' => USERNAME,
  'password' => PASSWORD
);

 // Create an SMTP client.
$mail = Mail::factory('smtp', $smtpParams);

 if (PEAR::isError($headers)) 
 { 
 die("Here's your error right here: " . $smtp->getUserInfo()); 
} 

// Send the email.
$result = $mail->send(RECIPIENT, $headers, BODY);


 if (PEAR::isError($result)) {
  echo("Email not sent. " .$result->getMessage() ."\n");
} else {
  echo("Email sent!"."\n");
}




}

?>