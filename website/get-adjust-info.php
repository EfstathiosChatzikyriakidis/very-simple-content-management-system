<?php

 // the following function gets basic website
 // information and configuration settings that
 // the user can change from the admin page.

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

 function get_adjust_info ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_adjust_info(). ".$GLOBALS['sql_database_connect_error']."<br>";
   return false;
  }

  $query = "select * from adjust_info";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_adjust_info(). ".$GLOBALS['sql_get_adjust_select_error']."<br>";
   return false;
  }

  $num_info = @mysql_num_rows ($result);
  if ($num_info == 0)
   return false;

  $result = @mysql_fetch_array ($result);

  return $result;
 }
?>
