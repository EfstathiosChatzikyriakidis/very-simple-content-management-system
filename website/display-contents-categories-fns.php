<?php

 // the following functions display data
 // related to cats, cons from database.

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

 // display all categories in the array passed in.
 function display_categories_user ($cat_array, $cat_url)
 {
  // is there any category?
  if (!is_array ($cat_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_cats'];
   return false;
  }

  echo '<table cellpadding="0" cellspacing="2" border="0" summary="">';
  echo ' <tbody>';

  // the following var is used for looping.
  $i = '';

  // create each url link for each category.
  foreach ($cat_array as $row)
  {
   // the show link.
   $url_path    = $cat_url.'?catid='.($row['cat_id']);
   $url_text    = clean_for_display ($row['cat_name']); 
   $url_title   = clean_for_display ($row['cat_description']);
   $url_target  = "main_column";

   // get number of contents.
   $number = get_cat_num_contents ($row['cat_id']);

   // print category info.
   echo  ' <tr>';
   echo  '  <td align="right" width="20">'.++$i.'.&nbsp;</td>';
   echo  '  <td>'.do_html_url ($url_path, $url_text, $url_title, $url_target).'.</td>';
   echo  '  <td>';

   if ($number == 0)
   {
    echo '<table cellpadding="0" cellspacing="0" border="0" summary="">';
    echo ' <tbody>';
    echo '  <tr>';
    echo '   <td>&nbsp;&nbsp;(</td>';
    echo '   <td valign="middle"><img src="'.DIR_GRAPHICS.'directory-icon.png" border="0" alt=""></td>';
    echo '   <td>)</td>';
    echo  ' </tr>';
    echo ' </tbody>';
    echo '</table>';
   }
   else
    echo '&nbsp;&nbsp;(<b>'.$number.'</b>)';

   echo  '  </td>';
   echo  ' </tr>';
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all contents in the array passed in.
 function display_contents_user ($content_array, $con_url)
 {
  // is there any content?
  if (!is_array ($content_array))
  {
   echo '<blockquote>'.$GLOBALS['there_are_no_cons'].'</blockquote>';
   return false;
  }

  echo '<table cellpadding="0" cellspacing="0" border="0" summary="">';
  echo ' <tbody>';
  echo '  <tr>';
  echo '   <td width="1">';
  echo      d_s (20, 1);
  echo '   </td>';
  echo '   <td>';
  echo '    <table cellpadding="3" cellspacing="2" border="0" summary="">';
  echo '     <tbody>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each content.    
  foreach ($content_array as $row)
  {
   // category name.
   $cat_name = get_category_name ($row['cat_id']);

   // the show link.
   $url_path   = $con_url.'?conid='.($row['con_id']);
   $url_title  = clean_for_display ($row['con_des_title']); 
   $url_target = "_self";

   // when the content was created.
   $con_date = $row['con_date'];
   $con_time = $row['con_time'];

   // the hits of the content.
   $con_hits = $row["con_hits"];

   // when the content was last changed.
   $con_change_date = $row['con_change_date'];
   $con_change_time = $row['con_change_time'];

   echo '     <tr>';
   echo '      <td>';
                // if the content is new print the newicon.
                if (strtotime ($con_date) > strtotime (date_add ($GLOBALS['conf_adjust_info']['content_days_new'])))
                 echo '<img src="'.DIR_GRAPHICS.'icon-new-content.png" border="0" hspace="5" alt="">';
                else 
                 echo '&nbsp;';
   echo '      </td>';

   // is there any graphic?
   if ($row["con_graphic"] != "no")
   {
    // check to see if the graphic exists.
    if (@file_exists (DIR_CONS.clean_for_display ($row['con_graphic'])))
    {
     $url_graphic = '<img src="'.DIR_CONS.clean_for_display ($row['con_graphic']).'" border="1" width="30" height="40" hspace="5" alt="">';

     echo '    <td>';
     echo       do_html_url ($url_path, $url_graphic, $url_title, $url_target);
     echo '    </td>';
    }
    else
     echo '    <td>'.$GLOBALS['there_is_no_graphic'].'</td>';
   }
   else
   {
    $url_graphic = '<img src="'.DIR_GRAPHICS.'no-content-graphic.png" border="1" width="30" height="40" hspace="5" alt="">';

    echo '     <td>';
    echo        do_html_url ($url_path, $url_graphic, $url_title, $url_target);
    echo '     </td>';

   }

   $url_text = clean_for_display ($row['con_base_title']);

   // get the length of the text.
   $length = utf8_strlen ($url_text);

   // cut content title.
   $url_text = utf8_substr ($url_text, 0, CONTENT_TITLE_MAX_LEN);

   echo '      <td width="25" align="center">'.++$i.'.</td>';
   echo '      <td>';
   echo         do_html_url ($url_path, $url_text, $url_title, $url_target);
   echo         ($length != utf8_strlen ($url_text)) ? '....' : '.';
   echo '      <br><b><acronym title="'.$GLOBALS['gui_con_datetime_long'].'">'.$GLOBALS['gui_con_datetime_short'].'</acronym> :</b> '.$con_date.' '.$con_time.' , <b><acronym title="'.$GLOBALS['gui_con_change_datetime_long'].'">'.$GLOBALS['gui_con_change_datetime_short'].'</acronym> :</b> '.$con_change_date.' '.$con_change_time.' , <b><acronym title="'.$GLOBALS['gui_con_hits_long'].'">'.$GLOBALS['gui_con_hits_short'].'</acronym> :</b> ';

   if ($con_hits == 1)
    echo $con_hits." ".$GLOBALS['gui_counter_one_time'];
   else if ($con_hits > 1)
    echo $con_hits." ".$GLOBALS['gui_counter_many_times'];
   else
    echo $con_hits." ".$GLOBALS['gui_counter_new_entry'];

   echo ".";

   echo '      </td>';
   echo '     </tr>';
  }

  echo '     </tbody>';
  echo '    </table>';
  echo '   </td>';
  echo '  </tr>';
  echo ' </tbody>';
  echo '</table>';

  return true;
 }
?>
