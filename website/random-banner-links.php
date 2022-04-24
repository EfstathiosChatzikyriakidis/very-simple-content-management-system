<?php

 // the following function prints random banner links.

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

 function random_banner_links ($max_links, $cols)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** random_banner_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // select random rows from the database.
  $result = @mysql_query ("select * from banner_links order by rand() limit $max_links");
  if (!$result)
  {
   echo "*** random_graphic_links(). ".$GLOBALS['sql_links_select_error'];
   return false;
  }

  $num_links = @mysql_num_rows ($result);
  if ($num_links == 0)
  {
   echo $GLOBALS['there_are_no_banner_links'];
   return false;
  }

  echo '<table cellpadding="0" cellspacing="0" border="0" summary="">';
  echo ' <tbody>';
  echo '  <tr>';

  // the following var is used for looping.
  $z = '';

  // for all the rows that you selected.
  while ($row = @mysql_fetch_array ($result))
  {
   $url_path  = clean_for_display (DIR_COMPONENTS.DIR_LINK_OUT.'o.php?out='.$row["url"]);
   $url_title = clean_for_display ($row["title"]);
  
   echo '  <td>';
 
   // display them to the screen.
   if ($row["url"] != "no")
   {
    echo '<a href="'.$url_path.'" target="_blank" ';
    echo 'title="'.$url_title.'">';
   }

   // check to see if the graphic file exists.
   if (@file_exists (DIR_BANNERS.clean_for_display ($row["graphic"])))
   {
    echo '<img src="'.DIR_BANNERS.clean_for_display ($row["graphic"]).'" ';
    echo 'width="88" height="31" border="0" hspace="4" alt="';
    echo clean_for_display ($row["title"]).'">';
   }
   else
    echo '&nbsp;&nbsp;'.$GLOBALS['there_is_no_graphic'].'&nbsp;&nbsp;';

   if ($row["url"] != "no")
    echo '</a>';

   echo '  </td>';

   // this must be done in order
   // to calculate the following.
   ++$z;

   // try to create a new col.
   if (!($z % $cols))
   {
    // have a new col or line of banner links.
    if ($z < $max_links)
    {
     echo '</tr>';
     echo '<tr>';
     echo ' <td colspan="'.$cols.'">';
     echo    d_s (1, 7);
     echo ' </td>';
     echo '</tr>';
     echo '<tr>';
    }
   }
  }

  echo '  </tr>';
  echo ' </tbody>';
  echo '</table>';

  return true;
 }
?>
