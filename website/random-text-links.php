<?php

 // the following function prints random text links.

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

 function random_text_links ($max_links)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** random_text_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // select random rows from the database.
  $result = @mysql_query ("select * from text_links order by rand() limit $max_links"); 
  if (!$result)
  {
   echo "*** random_text_links(). ".$GLOBALS['sql_links_select_error'];
   return false;
  }

  $num_links = @mysql_num_rows ($result);
  if ($num_links == 0)
  {
   echo $GLOBALS['there_are_no_text_links'];
   return false;
  }

  echo '<table cellpadding="0" cellspacing="3" border="0" summary="">';
  echo ' <tbody>';

  // the following var is used for looping.
  $i = 1;

  // for all the rows that you selected.
  while ($row = @mysql_fetch_array ($result)) 
  {
   // info link.
   $url_path    = clean_for_display (DIR_COMPONENTS.DIR_LINK_OUT.'o.php?out='.$row["url"]);
   $url_text    = clean_for_display ($row["text"]) ;
   $url_title   = clean_for_display ($row["title"]);
   $url_target  = "_blank";

   // display them to the screen.
   // create two columns of links.

   if ($i % 2)
    echo  ' <tr>';

   echo  '  <td>';
   echo  '   <img src="http://'.$GLOBALS['conf_http_host'].SLASH.DIR_GRAPHICS.'external-link-icon.png" hspace="10" border="0" alt="">';
   echo  '  </td>';
   echo  '  <td nowrap>'.do_html_url ($url_path, $url_text, $url_title, $url_target).'.</td>';

   if (!($i % 2))
    echo '  </tr>';
   
   ++$i; // increase links counter.
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }
?>
