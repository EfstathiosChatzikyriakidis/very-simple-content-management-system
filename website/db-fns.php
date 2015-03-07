<?php

 // database related functions.

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

 // try to connect to mysql and select db.
 function db_connect ()
 {
  // get mysql connect information.
  $host = $GLOBALS['conf_mysql_host'];
  $user = $GLOBALS['conf_mysql_user'];
  $pass = $GLOBALS['conf_mysql_pass'];
  $db   = $GLOBALS['conf_mysql_db'];
 
  // connect to mysql.
  $conn = @mysql_pconnect ($host, $user, $pass); 
  if (!$conn)
   return false;

  // UTF-8 collaction.
  mysql_query ("SET NAMES 'utf8'", $conn);

  // select db.
  if (! @mysql_select_db ($db))
   return false;

  return $conn;
 }

 // try to transform a table result to an array.
 function db_result_to_array ($result)
 {
  $res_array = array ();

  for ($count = 0; $row = @mysql_fetch_array ($result); $count++)
   $res_array[$count] = $row;

  return $res_array;
 }
?>
