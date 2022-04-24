<?php

 // the following function stores all the information
 // needed to have a clue of how many are the online
 // users and who they are (ip).

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

 function online_users ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** online_users(). ".$GLOBALS['sql_database_connect_error']."<br><br>";
   return false;
  }

  // fetch essential information.
  $timestamp = time ();
  $user_ip = $GLOBALS['conf_remote_address'];

  // try to have a record where ip_address = `$user_ip'.
  $result = @mysql_query ("select * from online_users where ip_address='$user_ip'");
  if (!$result)
  {
   echo "*** online_users() [1]. ".$GLOBALS['sql_online_select_error']."<br><br>";
   return false;
  }

  // change it to an array.
  $online_user = @mysql_fetch_array ($result);
  if ($online_user)
  {
   // update online user.
   $result = @mysql_query ("update online_users set last_date='$timestamp' where ip_address='$online_user[ip_address]'");
   if (!$result)
   {
    echo "*** online_users(). ".$GLOBALS['sql_online_update_error']."<br><br>";
    return false;
   }
  }
  else
  {
   // store online user.
   $result = @mysql_query ("insert into online_users (ip_address, last_date) values ('$user_ip', '$timestamp')"); 
   if (!$result)
   {
    echo "*** online_users(). ".$GLOBALS['sql_online_insert_error']."<br><br>";
    return false;
   }
  }

  // calculate timeout limit.
  $timeout = $timestamp - TIMEOUT_LIMIT_ONLINE_USERS;

  // remove users outside time limit.
  $result = @mysql_query ("delete from online_users where last_date < '$timeout'"); 
  if (!$result)
  {
   echo "*** online_users(). ".$GLOBALS['sql_online_delete_error']."<br><br>";
   return false;
  }

  // try to select all online users.
  $result = @mysql_query ("select count(*) from online_users");
  if (!$result)
  {
   echo "*** online_users() [2]. ".$GLOBALS['sql_online_select_error']."<br><br>";
   return false;
  }

  // get number of online users.
  $no_users = mysql_result ($result, 0, 0);

  echo $GLOBALS['gui_online_message']." <b><u>$no_users</u></b> ";

  if ($no_users == 1)
   echo $GLOBALS['gui_online_one_user'];
  else
   echo $GLOBALS['gui_online_many_users'];

  echo "<br>";

  return true;
 }
?>
