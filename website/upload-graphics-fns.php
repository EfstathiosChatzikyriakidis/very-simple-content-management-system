<?php

 // this file has function related to multiple files uploading.

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

 // initialize upload_errors array for processing.
 $upload_errors = array ();

 // function to check for acceptable file type.
 function ok_file_type ($filename, $type)
 {
  // if `conf_filetypes' array is empty then let everything through.
  if (count ($GLOBALS['conf_filetypes']) < 1)
  {
   return true;
  }
  // if no match is made to a valid file types array then kick it back.
  else if (!in_array ($type, $GLOBALS['conf_filetypes']))
  {
   $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$filename.'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_filetype_unknown'];
   return false;
  }
  // else - let the file through.
  else
  {                        
   return true;
  }
 }
            
 // function to check and move file.
 function process_file ($file, $path)
  {
   // set full path/name of file to be moved.
   $file['name'] = strtolower (str_replace (' ', '-', $file['name']));
   $upload_file = $path.$file['name'];
                    
   if (file_exists ($upload_file))
   {
    $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$file['name'].'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_file_exists'];
    return false;
   }

   if (!move_uploaded_file ($file['tmp_name'], $upload_file)) 
   {
    // failed to move file.
    $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$file['name'].'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_moved_not_ok'];
    return false;
   } 
   else 
   {
    // upload OK - change file permissions.
    chmod ($upload_file, UPLOADED_FILE_PERMISSIONS);
    return true;
   }
  }

 // function which parse all upload files.
 function upload_graphics ($_FILES, $path)
  {
   // check if the directory exists or not.
   if (!is_dir ("$path"))
   {
    echo '<br>'.$GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_is_no_dir'].'<br>';
    return false;
   }

   // check if the directory is writable.
   if (!is_writeable ("$path"))
   {
    echo '<br>'.$GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_is_no_write_perm_dir'].'<br>';
    return false;
   }

   // number of files?
   $no_files = 0;

   // is used for the useless input file.
   $flag = 0;

   // check to make sure files were uploaded.
   foreach ($_FILES as $file)
   {
    switch ($file['error'])
    {
     case 0:
      if ($file['size'] == 0)
      {
       // no file uploaded or the file is empty.
       $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$file['name'].'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_is_missing'];
       break;
      }
      else
       // file found.
       if ($file['name'] != NULL && ok_file_type ($file['name'], $file['type']) != false)
       {
        // process the file.
        if (process_file ($file, $path) == true)
        {
         $uploaded = $file['name'];
         echo '<br>'.$GLOBALS['gui_admin_upload_moved_ok'].' "<b><u>'.$uploaded.'</u></b>".<br>';
        }
       }
     break;

     case (1|2):
      // upload too large.
      $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$file['name'].'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_is_too_big'];
     break;

     case 4:
      if ($flag)
      {
       // no file uploaded.
       $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$file['name'].'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_moved_not_ok'];
       $flag = 1;
      }
     break;

     case (6|7):
      // no temp folder or failed write - server config errors.
      $GLOBALS['upload_errors'][] = '<br>'.$GLOBALS['gui_error_txt'].' "<b><u>'.$file['name'].'</u></b>".<br>&nbsp; '.$GLOBALS['gui_admin_upload_internal_error'];
     break;
    }

    $no_files++;
   }

   if ($no_files == 1)
   {
    echo '<br><b>'.$GLOBALS['gui_admin_upload_no_files_given'].'</b><br>';
    return false;
   }

   // is there any error?
   if (count ($GLOBALS['upload_errors']) > 0)
    foreach ($GLOBALS['upload_errors'] as $e) echo $e."<br>";

   // uploading done.
   return true;
  }
?>
