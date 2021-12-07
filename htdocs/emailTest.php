<?php
  $to_email = "samadmin@fcu.edu";
  $subject = "Simple Email Test via PHP";
  $body = "Hi,nn This is test email send by PHP Script";
  $headers = "From: thatonegroup8@gmail.com";
  
  if (mail($to_email, $subject, $body, $headers)) {
      echo "Email successfully sent to $to_email...";
  } else {
      echo "Email sending failed...";
  }
?>