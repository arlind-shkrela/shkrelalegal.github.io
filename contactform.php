<?php

$strFullname = $strEmail = $strMobile = $strPosition = "";
require 'assets/api/PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer(true);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 1;

//Ask for HTML-friendly debug output
//a$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.hostinger.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMsTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 463;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "info@shkrelalegal.com";

//Password to use for SMTP authentication
$mail->Password = "Shkrelalegal1!";

//Set who the message is to be sent from, you can use your own mail here
$mail->setFrom('arlind.shkrela@outlook.com');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('info@shkrelalegal.com');

//Set the subject line
$mail->Subject = 'New application form sent from ***** Career page';
$mail->IsHTML(true);

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $strFullname = $_POST['name'];
    $strEmail = $_POST['email'];
    $strMobile = $_POST['strMobile'];
    $strPosition = $_POST['strPosition'];
    //This part is where you will create your mail
    $mail->msgHTML("Fullname: ".$strFullname."\nEmail: ".$strEmail."\nMobile Number: ".$strMobile."\nDesired Position: ".$strPosition);


    //This part is for sending the mail
    if (!$mail->send()) {
    //If you want to check for errors. Uncomment the line below.
    //echo "Mailer Error: " . $mail->ErrorInfo;
        echo "<script>alert('Some error occured. Please try again later');</script>";
        header("Refresh:2");
}
    echo "<script>alert('Application form successfully sent!');</script>";
    header("Refresh:2");
}

?>