<?php

 // class for getting configuration settings from xml file.

 /*
  *  Copyright (c) 2007 Efstathios Chatzikyriakidis (stathis.chatzikyriakidis@gmail.com)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 class conf_settings
 {
  var $_settings = array ();

  function get ($var)
  {
   trigger_error ('Not yet implemented', E_USER_ERROR);
  }

  function load()
  {
   trigger_error ('Not yet implemented', E_USER_ERROR);
  }
 }

 class conf_settings_xml extends conf_settings
 {
  function get ($var)
  {
   $var = explode ('.', $var);

   $result = $this->_settings;

   foreach ($var as $key)
   {
    if (!isset ($result[$key]))
     return false;

    $result = $result[$key];
   }

   return $result;
  }

  function load ($file)
  {
   if (file_exists ($file) == false)
    return false;

   include (FILENAME_XML_LIBRARY);

   $xml = file_get_contents ($file);
   
   $data = XML_unserialize ($xml);

   $this->_settings = $data['conf_settings'];
  }
 }
?>
