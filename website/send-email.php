<?php

 // the following function tries to send an email.

 /*
  *  Copyright (c) 2006 Efstathios Chatzikyriakidis (stathis.chatzikyriakidis@gmail.com)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 function send_email ($_POST)
 {
  // process the contact form data.
  // use the data to send an email.

  // is the OS Windows or Mac or Linux?
  // check about the new line character. 
  if (strtoupper (substr (PHP_OS, 0, 3) == 'WIN'))
   $eol = "\r\n";
  elseif (strtoupper (substr (PHP_OS, 0, 3) == 'MAC'))
   $eol = "\r";
  else
   $eol = "\n";

  // this email address is used for 'to' and 'from'.
  $email_address = $GLOBALS['conf_adjust_info']['client_email_address'];

  // is used for storing error messages.
  $errors = array ();

  // check the values. fix them.
  $name    = clean  ($_POST['name']);
  $email   = clean  ($_POST['email']);
  $message = pretty ($_POST['message']);

  // is there any empty item?
  if (!filled_out ($_POST))
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'].'<br><br>';
   return false;
  }    

  // check the email address form.
  if (!valid_email ($email))
   $errors[] = '<li><u>'.$GLOBALS['gui_contact_incorrect_email'].'</u>.</li>';

  // check the length of the email.
  if (strlen ($email) < 6 || strlen ($email) > 40)
   $errors[] = '<li><u>'.$GLOBALS['gui_contact_email_limits'].' 6 - 40</u>.</li>';

  // check the length of the message.
  if (strlen ($message) < 15 || strlen ($message) > 300)
   $errors[] = '<li><u>'.$GLOBALS['gui_contact_message_limits'].' 15 - 300</u>.</li>';

  // is there any error?
  if (count ($errors) > 0)
  {
   echo $GLOBALS['gui_contact_correct_errors'].' <br><br><ol>';

   foreach ($errors as $e) echo $e;

   echo '</ol><br>'.$GLOBALS['gui_try_again'].'<br><br>';
   return false;
  }

  // no errors. send email.
  $toaddress = clean_for_display ($email_address);
  $subject   = $GLOBALS['gui_contact_email_subject'].' http://'.$GLOBALS['conf_http_host'].' [ '.date("Y/m/d H:i:s").' ]';

  // form the body of the message.
  $mailcontent  = $GLOBALS['gui_contact_message_name']  . ' ' . $name  . $eol;
  $mailcontent .= $GLOBALS['gui_contact_message_email'] . ' ' . $email . $eol;
  $mailcontent .= $GLOBALS['gui_contact_message_text']  . ' ' . $eol   . $eol . $message . $eol;

  $mailcontent = stripslashes ($mailcontent);
  $fromaddress = clean_for_display ($email_address);

  // try to send the message.
  if (mail ($toaddress, $subject, $mailcontent, $fromaddress))
   return true;
  else 
   return false;
 }
?>
