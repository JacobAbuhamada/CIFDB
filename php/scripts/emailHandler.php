<?php
// the message

if($_POST["submit"]){

  ini_set("SMTP", "smtp.gmail.com");
  ini_set("smtp_server", "ssl://smtp.gmail.com");
  ini_set("sendmail_from", "cif.database@gmail.com");
  // ini_set("host", "smtp.gmail.com");
  ini_set("smtp_port", 465);

  $msg = "First line of text\nSecond line of text";
  
  // use wordwrap() if lines are longer than 70 characters
  $msg = wordwrap($msg,70);
  
  // send email
  mail("example@yahoo.com","My subject",$msg);
}
?>