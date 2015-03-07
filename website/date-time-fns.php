<?php

 // functions related with date and time.

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

 // return formed date with a string.
 function return_date ($string)
 {
  return $string.date ($GLOBALS['conf_xml_sets']->get ("output.format.date"));
 }

 // return formed time with a string.
 function return_time ($string)
 {
  return $string.date ($GLOBALS['conf_xml_sets']->get ("output.format.time"));
 }

 // show both date and time.
 function date_time ($date_txt, $time_txt, $separator='')
 {
  // if there isn't any separator
  // try to get the default one.
  if (!var_exist ($separator))
   $separator = $GLOBALS['conf_xml_sets']->get ("output.format.separator");

  echo return_date ($date_txt); echo '.';
  echo $separator;
  echo return_time ($time_txt); echo '.';
 }
 
 // + or - days from the current date.
 function date_add ($v, $d = null, $format = "Y-m-d")
 {
  $d = ($d ? $d : date ("Y-m-d"));

  return date ($format, strtotime ($v." days", strtotime ($d)));
 }
?>
