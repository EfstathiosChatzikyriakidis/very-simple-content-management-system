<?php

 // the following function gets a template depending on the ip address.

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

 function get_template ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_template(). ".$GLOBALS['sql_database_connect_error']."<br>";
   return false;
  }

  $query = "select * from ip_templates where ip_address='".$GLOBALS['conf_remote_address']."'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_template(). ".$GLOBALS['sql_get_temp_select_error']."<br>"; 
   return false;
  }

  $num = @mysql_num_rows ($result);
  if ($num == 0)
   return false;

  $result = @mysql_result ($result, 0, 'template_directory');

  return $result;
 }
?>
