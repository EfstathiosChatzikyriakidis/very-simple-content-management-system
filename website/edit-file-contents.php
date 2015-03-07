<?php

 // the following function tries to update a file.

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

 function update_file_contents ($_POST)
 {
  // fetch the path of the filename
  // and the contents of that file.
  $file_path     = clean        ($_POST['file_path']);
  $file_contents = stripslashes ($_POST['file_contents']);

  // is there any empty item?
  if (!filled_out ($_POST))
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'].'<br>';
   return false;
  }

  // does the file exist?
  if (!file_exists ($file_path))
  {
   echo $GLOBALS['gui_admin_update_file_contents_doesnt_exist'].'<br>';
   return false;
  }

  // has the file write permissions?
  if (!is_writeable ($file_path))
  {
   echo $GLOBALS['gui_admin_update_file_contents_w_failed'].'<br>';
   return false;
  }

  // try to open the file.
  $fp = @fopen ($file_path, "w");

  // write the contents to the file.
  fwrite ($fp, $file_contents);

  // close the file.
  fclose ($fp);

  // print a message.
  echo $GLOBALS['gui_admin_update_file_contents_done'].'<br>';

  // the file is updated.
  return true;
 }
?>
