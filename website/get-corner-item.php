<?php

 // the following function gets a corner item.

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

 function get_corner_item ($valign, $align)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "get_corner_item(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from corner_items where valign='$valign' and align='$align'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "get_corner_item(). ".$GLOBALS['sql_get_corner_select_error']; 
   return false;
  }

  $num_items = @mysql_num_rows ($result);
  if ($num_items == 0)
   return false;

  $result = @mysql_fetch_array ($result);

  return $result;
 }
?>
