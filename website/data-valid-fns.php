<?php

 // data validation related functions.

 /*
  *  Copyright (c) 2006 Efstathios Chatzikyriakidis (contact@efxa.org)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 // check to see if there are
 // any empty items in a form.
 function filled_out ($form_vars)
 {
  foreach ($form_vars as $key => $value)
  {
   if (!isset ($key) || ($value == '')) 
    return false;
  } 

  return true;
 }

 // check to see if the variable
 // both exists and is not empty.
 function var_exist ($variable)
 {
  if (!isset ($variable) || ($variable == '')) 
   return false;

  return true;
 }

 // prepare a string for displaying.
 function clean_for_display ($string)
 {
  $string = trim ($string);
  $string = stripslashes ($string);
  $string = strip_tags ($string);

  return $string;
 }

 // try to clean a string.
 function clean ($string)
 {
  // use secure method.
  $string = secure_clean ($string);

  return $string;
 }

 // secure version. no html tags support.
 function secure_clean ($string)
 {
  $string = trim ($string);
  $string = strip_tags ($string);
  $string = addslashes ($string);

  return $string;
 }

 // no secure version. html tags support.
 function simple_clean ($string)
 {
  $string = trim ($string);
  $string = addslashes ($string);

  return $string;
 }

 // clean an array of strings.
 function clean_all ($array)
 {
  foreach ($array as $key => $value)
   $array[$key] = clean ($value);

  return $array;
 }

 // prepare a message for displaying.
 function pretty_for_display ($string)
 {
  $string = stripslashes ($string);
  $string = nl2br ($string);

  return $string;
 }

 // try to prepare a message.
 function pretty ($string)
 {
  // use simple method.
  $string = simple_pretty ($string);

  return $string;
 }

 // no secure version. html tags support.
 function simple_pretty ($string)
 {
  $string = trim ($string);
  $string = addslashes ($string);

  return $string;
 }

 // secure version. no html tags support.
 function secure_pretty ($string)
 {
  $string = trim ($string);
  $string = strip_tags ($string);
  $string = addslashes ($string);

  return $string;
 }

 // prepare an array of messages.
 function pretty_all ($array)
 {
  foreach ($array as $key => $val)
   $array[$key] = pretty ($val);

  return $array;
 }

 // see if email address
 // given is valid or not.
 function valid_email ($address)
 {
  // check the syntax of the email.
  $valid_email_expr =  "^[0-9a-z~!#$%&_-]([.]?[0-9a-z~!#$%&_-])*" .
                       "@[0-9a-z~!#$%&_-]([.]?[0-9a-z~!#$%&_-])*$";

  // does email address exists?
  if (function_exists ("getmxrr") && function_exists ("gethostbyname"))
  {
   // extract the domain of the email address.
   $mail_domain = substr (strstr ($address, '@'), 1);

   if (!(getmxrr ($mail_domain, $temp) || gethostbyname ($mail_domain) != $mail_domain))
    return false;
  }

  // validate the email address.
  if (eregi ($valid_email_expr, $address))
   return true;

  return false;
 }

 // convert email address for secutiry reasons.
 function convert_email ($email, $type = 3)
 {
  // convert `.' and `@'.
  switch ($type)
  {
   case 1:
    $email_conv = str_replace ("." , " dot " , $email);
    $email_conv = str_replace ("@" , " at "  , $email_conv);
    $email = $email_conv;
    break;

   case 2:
    $email_conv = str_replace (" dot " , "." , $email);
    $email_conv = str_replace (" at "  , "@" , $email_conv);
    $email = $email_conv; 
    break;

   default: break;
  }

  $email_conv = "";

  // drop through...
  for ($i = 0; $i < strlen ($email); $i++)
   $email_conv .= sprintf ("&#%03d;", ord ($email{$i}));

  return $email_conv;
 }
 
 // check for numeric array.
 function is_numeric_array ($ar)
 {
  $keys = array_keys ($ar);
  natsort ($keys); // string keys will be last.
  return is_int (array_pop ($keys));
 }

 // check for associative array.
 function is_assoc_array ($ar)
 {
  $keys = array_keys ($ar);
  natsort ($keys); // numeric keys will be first.
  return is_string (array_shift ($keys));
}
?>
