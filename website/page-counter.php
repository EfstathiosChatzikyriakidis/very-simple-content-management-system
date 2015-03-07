<?php

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

 // the following function is page counter (works with session).

 // how it works:
 //   tries to see if there is a counter for the current page.
 //   if there is one, updates and prints the counter info.
 //   otherwise, install a new one for the current new page
 //   and print the counter info. there is a session, so it
 //   updates hits only one time.

 function page_counter ($str_message, $inv=0)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** page_counter(). ".$GLOBALS['sql_database_connect_error']."<br><br>";
   return false;
  }

  // have the name of the current file
  // being processed (with variables).
  $page_address = $GLOBALS['conf_script_name'];

  // try to select the counter for the current page.
  $sql = "select * from page_counters where page_path ='".$page_address."' LIMIT 1";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** page_counter() [1]. ".$GLOBALS['sql_page_counter_select_error']."<br><br>";
   return false;
  }

  // have an array of this entry.
  $data = @mysql_fetch_array ($result);

  // $data["id"]        - this part of the array stores the ID of the record in the database for this page.
  // $data["page_path"] - this is the actual path & filename of the URL to which this record belongs.
  // $data["hits"]      - this, surprisingly, is the number of hits the page above has received.

  // is there an entry?
  if ($data)
  {
   // session facility permits only one hit.
   // we must have a session only for this page.
   if (!session_is_registered ("$page_address"))
   {
    // update the counter for this page, increase the hits field.
    $sql = "update page_counters set hits=hits+1 where page_path ='".$page_address."'";
    $result = @mysql_query ($sql);
    if (!$result)
    {
     echo "*** page_counter(). ".$GLOBALS['sql_page_counter_update_error']."<br><br>";
     return false;
    }
   }
  }
  else
  {
   // install a counter for the new page.
   $sql = "insert into page_counters (id, page_path, hits) values (NULL, '".$page_address."', 1)";
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** page_counter(). ".$GLOBALS['sql_page_counter_insert_error']."<br><br>";
    return false;
   }
  }

  // create a session register variable.
  session_register ("$page_address");

  // print counter information if it's needed.
  if ($inv)
  {
   // to print the updated hits we need to fetch again the
   // record. try to select the counter for the current page
   // in order to echo information.
   $sql = "select * from page_counters where page_path ='".$page_address."' LIMIT 1";
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** page_counter() [2]. ".$GLOBALS['sql_page_counter_select_error']."<br><br>";
    return false;
   }

   // have an array of this entry.
   $data = @mysql_fetch_array ($result);

   echo $str_message.' <b><u>'.$data["hits"].'</u></b> ';

   if ($data["hits"] == 1)
    echo $GLOBALS['gui_counter_one_time'];
   else
    echo $GLOBALS['gui_counter_many_times'];
    
   echo '.<br>';
  }

  return true;
 }
?>
