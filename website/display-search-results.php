<?php

 // the following function displays search results.

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

 function display_search_results ($_POST)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** display_search_results(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $cat_id   = clean ($_POST['cat_id']);
  $field_id = clean ($_POST['field_id']);
  $keyword  = clean ($_POST['keyword']);

  // is there any empty item?
  if (!filled_out ($_POST))
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  if ($cat_id != "all_cats")
  {
   echo $GLOBALS['gui_search_one_cat'];
   echo " ' ".get_category_name ($cat_id)." ' ";
  }
  else
   echo $GLOBALS['gui_search_all_cats'];

  echo " ".$GLOBALS['gui_search_keyword']." ' ".$keyword." '.<br><br>";

  // select the appropriate query.
  if ($cat_id != "all_cats")
   $query = "select * from content_items where ".$field_id." like '%".$keyword."%' and cat_id='$cat_id' and con_visibility=1";
  else
   $query = "select * from content_items where ".$field_id." like '%".$keyword."%' and con_visibility=1";

  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** display_search_results(). " . $GLOBALS['sql_get_search_select_error'];
   return false;
  }

  $num_results = @mysql_num_rows ($result);
  
  if ($num_results == 0)
   echo "<b>".$GLOBALS['there_are_no_search_results']."</b>";  
  else
  {
   echo $GLOBALS['gui_search_num_cons'].' '.$num_results.'<br><br><br>';

   echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
   echo ' <tbody>';
   echo '  <tr bgcolor="#2c2c39">';
   echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_search_table_content_title'].'</td>';
   echo '  </tr>';

   // the following var is used for looping.
   $z = '';

   // create a table row for each text link.    
   for ($i = 0; $i < $num_results; $i++)
   {
    $row = mysql_fetch_array ($result);

    // the show link.
    $url_path   = FILENAME_SHOW_CONTENT.'?conid='.($row['con_id']);
    $url_title  = clean_for_display ($row['con_des_title']);
    $url_text   = clean_for_display ($row['con_base_title']);
    $url_target = "_self";

    // get the length of the text.
    $length = utf8_strlen ($url_text);

    // cut content title.
    $url_text = utf8_substr ($url_text, 0, CONTENT_TITLE_MAX_LEN);

    echo ' <tr bgcolor="#1c1c19">';
    echo '  <td width="25" align="center">'.++$z.'.</td>';
    echo '  <td>';
    echo     do_html_url ($url_path, $url_text, $url_title, $url_target);
    echo     ($length != utf8_strlen ($url_text)) ? '....' : '.';
    echo '  </td>';
    echo ' </tr>';
   }

   echo ' </tbody>';
   echo '</table>';
  }

  return true;
 }
?>
