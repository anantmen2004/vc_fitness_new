<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function mailer($to, $subject, $body, $attachment=false, $attachment2=false) 
{
    //echo APPPATH; exit();
	require_once('mailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;

    //print_r($mail);

    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "test@gmail.com"; //email id                 
    $mail->Password = ""; //password                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 587;                                   

    $mail->From = "test@gmail.com";
    $mail->FromName = "test";
    $base_path =  base_url();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    
    if($attachment != false){
        $path = $root."/tours/assets/";
        $mail->AddAttachment($path.$attachment);
    }

    if($attachment2 != false){
    	$path = $root."/tours/assets/";
        $mail->AddAttachment($path.$attachment2);
    }

    $mail->addAddress($to);

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = "This is the plain text version of the email content";

    if(!$mail->send()) 
    {
        //echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        //echo "Message has been sent successfully";
    }
}
?>
