<?php

 // the following function prints random graphic links.

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

 function random_graphic_links ($max_links, $cols)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "<br> *** random_graphic_links(). ".$GLOBALS['sql_database_connect_error']."<br><br>";
   return false;
  }

  // select random rows from the database.
  $result = @mysql_query ("select * from graphic_links order by rand() limit $max_links");
  if (!$result)
  {
   echo "<br> *** random_graphic_links(). ".$GLOBALS['sql_links_select_error']."<br><br>";
   return false;
  }

  $num_links = @mysql_num_rows ($result);
  if ($num_links == 0)
  {
   echo $GLOBALS['there_are_no_graphic_links'];
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
  
   echo '  <td align="center" valign="middle">';
 
   // display them to the screen.
   if ($row["url"] != "no")
   {
    echo '<a href="'.clean_for_display (DIR_COMPONENTS.DIR_LINK_OUT.'o.php?out='.$row["url"]).'" target="_blank" ';
    echo 'title="'.clean_for_display ($row["title"]).'">';
   }

   // check to see if the graphic file exists.
   if (@file_exists (DIR_LINKS.clean_for_display ($row["graphic"])))
   {
    echo '<img src="'.DIR_LINKS.clean_for_display ($row["graphic"]).'" ';
    echo 'width="100" height="129" border="1" hspace="6" alt="';
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
    // have a new col or line of graphic links.
    if ($z != $max_links)
    {
     echo '</tr>';
     echo '<tr>';
     echo ' <td colspan="'.$cols.'">';
     echo    d_s (1, 9);
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
