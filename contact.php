<?php
$error = false;


empty($_POST["name"]) ? $error = true : $name = $_POST['name'] ;
empty($_POST["email"]) ? $error = true : $email = $_POST['email'] ;
empty($_POST["message"]) ? $error = true : $message = $_POST['message'] ;
      
if(isset($name)){ $_SESSION["username"] = $name; }
if(isset($email)) { $_SESSION["useremail"] = $email; }
if(isset($message)) {  $_SESSION["usermeassage"] = $message; }

if ( !$error ) 
{        
        $to = 'IanGauthier@me.com'; 
        $from = "From: " . $email . "\r\n"; 
        $subject = 'Message from ' . $name;
        $errEmail = null; 
        $errHuman = null; 
        $errMessage = null; 
        $errName = null;
        
        $body = "$message";
 
 
// If there are no errors, send the email
    if (mail ($to, $subject, $body, $from)) 
    {
        echo '<script type="text/javascript">  
                    alert("Email sent");
                    window.location = "/Ian-Portfolio/index.php";
              </script>';
    } 
    else 
    {
        echo '<script type="text/javascript">  
                    alert("Email was not sent. Please resubmit the form");
                    window.location = "/Ian-Portfolio/index.php#5";
              </script>';
    }

}
else
{
  echo '<script type="text/javascript">  
                    alert("Email was not sent. Please resubmit the form");
                    window.location = "/Ian-Portfolio/index.php#5";
              </script>';  
}

?>