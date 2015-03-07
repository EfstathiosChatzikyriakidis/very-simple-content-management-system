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

 // require all functions.
 require_once ("vs-cms-fns.php");

 // try to connect to mysql and select db.
 if (!db_connect ())
  die ("*** ".FILENAME_RANDOM_CONTENT.". ".$sql_database_connect_error);

 // get a random con_id from the contents table.
 $result = @mysql_query ("select con_id, con_visibility from content_items where con_visibility = 1 order by rand() limit 1");
 if (!$result)
  die ("*** ".FILENAME_RANDOM_CONTENT.". ".$sql_get_contents_select_error);

 // insert the con_id number to the variable.
 $result = @mysql_result ($result, 0, 'con_id');
 if (!$result)
  die ("*** ".FILENAME_RANDOM_CONTENT.". ".$sql_get_con_details_select_error);

 // redirect to show content page with the random con_id.
 header ('Location: http://'.$conf_http_host.SLASH.FILENAME_SHOW_CONTENT.'?conid='.clean_for_display ($result));

 // this code (comment) will never reached.
?>
