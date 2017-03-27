<?php

if(isset($_POST['xemail'])) {

    $email_to = "tech@iitj.ac.in";
 
    $email_subject = "Technical Society IIT Jodhpur ";

 
    function died() {
 
        // your error code can go here
 
        echo "<script>alert('We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "Please go back and fix these errors.')</script>";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['xname']) ||
 
        !isset($_POST['xemail']) ||
 
        !isset($_POST['xmessage'])) {
 
        died();       
 
    }
 
     
    $name = $_POST['xname'];
    $email = $_POST['xemail'];
    $message = $_POST['xmessage'];
    
    if($name==""||$email==""||$message=""){
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }
 
    $email_message = "It is the message from the Technical Society site having details as below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";

 
	// create email headers
	 
	$headers = 'From: '.$email."\r\n".
	 
	'Reply-To: '.$email."\r\n" .
	 
	'X-Mailer: PHP/' . phpversion();
	 
	@mail($email_to, $email_subject, $email_message, $headers);  


?>
 
 
 
<!-- include your own success html here -->
 
 
 
<div class="container">
    <p class="center row "style="text-align:center;background:#3B3168;color:white;padding:5%;font-size:25px;">Thank you for contacting us, We ill be in touch with you very soon.</p>
 </div>
 
 
<?php
 
}
 
?>