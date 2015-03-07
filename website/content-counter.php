<?php

 /*
  *  Copyright (c) 2007 Efstathios Chatzikyriakidis (contact@efxa.org)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 // the following function is a content hit counter (works with session).

 // how it works:
 //   tries to see if there is a content with the given content id.
 //   if there is one, updates the hits of it and prints the hits info.
 //   otherwise, return false. there is a session, so it updates hits 
 //   only one time.

 function content_counter ($conid, $str_message, $inv = 0)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** content_counter(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // have the name of the current file
  // being processed (with query variables).
  $page_address = $GLOBALS['conf_script_query'];

  // try to select the content by using the content id.
  $sql = "select con_id, con_hits from content_items where con_id ='$conid'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** content_counter() [1]. ".$GLOBALS['sql_con_counter_select_error'];
   return false;
  }

  // have an array of this entry.
  $data = @mysql_fetch_array ($result);

  // $data["con_id"]   - this part of the array stores the ID of the record in the database for this content.
  // $data["con_hits"] - this, surprisingly, is the number of hits the content above has received.

  // is there an entry?
  if ($data)
  {
   // session facility permits only one hit.
   // we must have a session only for this page.
   if (!session_is_registered ("$page_address"))
   {
    // update the hit counter for this content, increase the hits field.
    $sql = "update content_items set con_hits=con_hits+1 where con_id ='$conid'";
    $result = @mysql_query ($sql);
    if (!$result)
    {
     echo "*** content_counter(). ".$GLOBALS['sql_con_counter_update_error']."<br><br>";
     return false;
    }
    
    // create a session register variable.
    session_register ("$page_address");
   }
  }
  else
   // there is no content with the given content id.
   return false;

  // print hit content hits information if it's needed.
  if ($inv)
  {
   // to print the updated hits we need to fetch again the record.
   // show try to select the content in order to echo information.
   $sql = "select con_hits from content_items where con_id ='$conid'";
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** content_counter() [2]. ".$GLOBALS['sql_con_counter_select_error']."<br><br>";
    return false;
   }

   // have an array of this entry.
   $data = @mysql_fetch_array ($result);

   echo $str_message.' <b><u>'.$data["con_hits"].'</u></b> ';

   if ($data["con_hits"] == 1)
    echo $GLOBALS['gui_counter_one_time'];
   else
    echo $GLOBALS['gui_counter_many_times'];
    
   echo '.<br>';
  }

  return true;
 }
?>
