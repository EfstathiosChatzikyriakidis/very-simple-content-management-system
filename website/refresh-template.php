<?php

 // if the client's ip address is unknown install a basic template.
 // otherwise, try to change the template in case of a GET request.

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

 function refresh_template ($_GET)
 {
  // we need the following variable.
  global $conf_remote_address;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** refresh_template(). ".$GLOBALS['sql_database_connect_error']."<br>";
   return false;
  }

  // try to select the template for the current ip address.
  $sql = "select * from ip_templates where ip_address ='".$conf_remote_address."' limit 1";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** refresh_template(). ".$GLOBALS['sql_refresh_temp_select_error']."<br>";
   return false;
  }

  // have an array of this entry.
  $data = @mysql_fetch_array ($result);

  // is there an entry?
  if ($data)
  {
   // is there any variable template?
   if (!isset ($_GET['template']))
    return false;

   $template = clean ($_GET['template']);

   // is it empty?
   if (!var_exist ($template))
    return false;

   // update the template for this ip address.
   $sql = "update ip_templates set template_directory='".$template."' where ip_address ='".$conf_remote_address."'";
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** refresh_template(). ".$GLOBALS['sql_refresh_temp_update_error']."<br>";
    return false;
   }
  }
  else
  {
   // install a default template to this ip address.
   $sql = "insert into ip_templates (id, ip_address, template_directory) values (NULL, '".$conf_remote_address."', '".$GLOBALS['conf_xml_sets']->get ("template.theme.guest")."')";
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** refresh_template(). ".$GLOBALS['sql_refresh_temp_insert_error']."<br>";
    return false;
   }
  }

  return true;
 }
?>
