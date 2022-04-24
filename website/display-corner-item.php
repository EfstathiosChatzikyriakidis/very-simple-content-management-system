<?php

 // the following function displays a corner item.

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

 function display_corner_item ($item, $path)
 {
  // check to see if there is an item.
  if (!var_exist ($item))
  {
   echo $GLOBALS['there_is_no_corner'];
   return false;
  }
 
  // try to print the item.

  // is it link?
  if ($item['url'] != "no")
   echo '<a href="'.clean_for_display ($item['url']).'" title="'.clean_for_display ($item['title']).'">';

  // print the graphic.
  echo '<img alt="'.clean_for_display ($item['title']).'" border="0" src="'.$path.clean_for_display ($item['graphic']).'">';

  // if it is a link close it.
  if ($item['url'] != "no")
   echo '</a>';

  return true;
 }
?>
