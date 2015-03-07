<?php

 // the following functions dipslay, print, echo, output data.

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

 // display a pixel graphic. its size
 // depends on '$width' and '$height'.
 function d_s ($width = 1, $height = 1)
 {
  echo '<img src="http://'.$GLOBALS['conf_http_host'].SLASH.DIR_GRAPHICS.'pixel.png" border="0" width="';
  echo $width.'" height="'.$height.'" alt="">';
 }

 // print a single-line text box.
 function input_text ($name, $style, $value)
 {
  echo '<input type="text" name="'.$name.'" style="'.$style.'" value="'.$value.'">';
 }

 // print a single-line text file box.
 function input_file ($name, $other)
 {
  echo '<input type="file" name="'.$name.'" '.$other.'>';
 }

 // print a textarea.
 function input_textarea ($name, $style, $value)
 {
  echo '<textarea style="'.$style.'" name="'.$name.'" cols="0" rows="0">'.$value.'</textarea>';
 }

 // print a submit or reset button.
 function input_button ($type, $name, $value)
 {
  if ($type != "image")
   echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'">';
  else
   echo '<input type="'.$type.'" name="'.$name.'" src="'.$value.'">';
 }

 // return an html link.
 function do_html_URL ($url, $text, $title, $target, $other = '')
 {
  return '<a '.$other.' href="'.$url.'" title="'.$title.'" target="'.$target.'">'.$text.'</a>';
 }

 // turns e-mail address into link.
 function auto_email_link ($input)
 {
  $output = eregi_replace ("(([a-z0-9\-\.]+)@([a-z0-9\-\.]+)\.([a-z0-9]+))", "<a href=\"mailto:\\0\">\\0</a>", $input);

  return $output;
 }

 // display a "yes/no" select box.
 function select_boolean ($select_name, $selected, $style)
 {
  // display the select box.
  echo '<select style="'.$style.'" name="'.$select_name.'">';
  echo ' <option value=""> '.$GLOBALS['gui_select_txt'].'</option>';
  echo ' <option value="0"'.(!$selected ?' selected' : '').'> '.$GLOBALS['gui_no_txt'].'</option>'; 
  echo ' <option value="1"'.($selected  ?' selected' : '').'> '.$GLOBALS['gui_yes_txt'].'</option>'; 
  echo '</select>';
 }

 // this function takes a directory path
 // and tries to create a select box with
 // the files which contains.
 function select_from_directory ($path, $selected, $select_name, $style, $function = '')
 {
  // check if the directory exists or not.
  if (!is_dir ("$path"))
  {
   echo $GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_is_no_dir'].'<br>';
   return false;
  }

  // check if the directory is writable.
  if (!is_readable ("$path"))
  {
   echo $GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_is_no_read_perm_dir'].'<br>';
   return false;
  }

  // try to open the directory
  if ($dir = @opendir ($path))
   {
    // start reading its files..
    while ($file = readdir ($dir))
     // accept only directories.
     if (is_dir ($path.$file))
      // ignore parent and current directory.
      if ($file != ".." && $file != ".")
       // do not support hidden directories.
       if (!($file[0] == '.'))
        // store directory.
        $filelist[] = $file;
   }

  // close directory.
  closedir ($dir);

  if (count ($filelist) == 0)
  {
   echo $GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_are_no_sub_dirs'].'<br>';
   return false;
  }

  // display the select box.
  if ($function == '')
   echo '<select style="'.$style.'" name="'.$select_name.'">';
  else
   echo '<select style="'.$style.'" name="'.$select_name.'" onchange="'.$function.'">';
  
  // for all directories create option tag.
  while (list ($key, $val) = each ($filelist))
  {
   echo '<option value="'.$val.'"';
   if ($val == $selected)
   echo ' selected';
   echo '>'.$val.'</option>';
  }

  echo '</select>';

  return true;
 }

 // this function takes a directory path
 // and tries to create a select box with
 // its files. 
 function select_file ($path, $selected, $select_name, $style, $function = '')
 {
  // check if the directory exists or not.
  if (!is_dir ("$path"))
  {
   echo $GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_is_no_dir'].'<br>';
   return false;
  }

  // check if the directory is writable.
  if (!is_readable ("$path"))
  {
   echo $GLOBALS['gui_error_txt'].' " <b><u>'.$path.'</u></b> ". '.$GLOBALS['there_is_no_read_perm_dir'].'<br>';
   return false;
  }

  // try to open the directory
  if ($dir = @opendir ($path))
   {
    // start reading its files..
    while ($file = readdir ($dir))
     // do not accept directories.
     if (!is_dir ($path.$file))
      // ignore parent and current directory     
      if ($file != ".." && $file != ".")
       // ignore hidden files.
       if (!($file[0] == '.'))
        // store file.
        $filelist[] = $file;
   }

  // close directory.
  closedir ($dir);

  // display the select box.
  if ($function == '')
   echo '<select style="'.$style.'" name="'.$select_name.'">';
  else
   echo '<select style="'.$style.'" name="'.$select_name.'" onchange="'.$function.'">';
  
  // sort all files.
  asort ($filelist);

  echo '<option value="no">'.$GLOBALS['gui_without_graphic'].'</option>';

  if (count ($filelist) != 0)
  {
   // for all files create option tag.
   while (list ($key, $val) = each ($filelist))
   {
    echo '<option value="'.$val.'"';
    if ($val == $selected)
    echo ' selected';
    echo '>'.$val.'</option>';
   }
  }

  echo '</select>';

  return true;
 }

 // the following function helps us to avoid the usual
 // pitfalls and offers some flexibility in formatting.
 function my_truncate ($string, $limit, $break = ".", $pad = "...")
 {
  // return with no change if string is shorter than $limit.
  if (strlen ($string) <= $limit) return $string;
  
  // is $break present between $limit and the end of the string?
  if (false !== ($breakpoint = strpos ($string, $break, $limit)))
  {
   if ($breakpoint < strlen ($string) - 1)
   {
    $string = substr ($string, 0, $breakpoint) . $pad;
   }
  }
  
  return $string;
 }
 
/**
 * translates a character position into an 'absolute' byte position.
 *
 * @param    string        UTF-8 string.
 * @param    integer       Character position (negative values start from the end).
 * @return   integer       Byte position.
 *
 * @author   Martin Kutschker <martin.t.kutschker@blackbox.net>
 */
 function utf8_char2byte_pos ($str, $pos)
 {
  $n = 0;          // number of characters found.
  $p = abs ($pos); // number of characters wanted.
  
  if ($pos >= 0)
  {
   $i = 0;
   $d = 1;
  }
  else
  {
   $i = strlen ($str)-1;
   $d = -1;
  }
  
  for(; strlen ($str{$i}) && $n<$p; $i+=$d)
  {
   $c = (int)ord($str{$i});
   if (!($c & 0x80)) // single-byte (0xxxxxx).
    $n++;
   elseif (($c & 0xC0) == 0xC0) // multi-byte starting byte (11xxxxxx).
    $n++;
  }

  if (!strlen ($str{$i}))
   return false; // offset beyond string length.
  
  if ($pos >= 0)
  {
   // skip trailing multi-byte data bytes.
   while ((ord($str{$i}) & 0x80) && !(ord($str{$i}) & 0x40)) { $i++; }
  }
  else
  {
   // correct offset.
   $i++;
  }

  return $i;
 }

/**
 * counts the number of characters of a string in UTF-8.
 * unit-tested by Kasper and works 100% like strlen() / mb_strlen().
 *
 * @param     string        UTF-8 multibyte character string.
 * @return    integer       The number of characters.
 *
 * @author    Martin Kutschker <martin.t.kutschker@blackbox.net>
 */
 function utf8_strlen ($str)
 {
  $n = 0;

  for ($i = 0; isset ($str{$i}) && strlen ($str{$i})>0; $i++)
  {
   $c = ord ($str{$i});
   if (!($c & 0x80)) // single-byte (0xxxxxx).
    $n++;
   elseif (($c & 0xC0) == 0xC0) // multi-byte starting byte (11xxxxxx).
    $n++;
  }

  return $n;
 }

/**
 * returns a part of a UTF-8 string.
 * Unit-tested by Kasper and works 100% like substr() / mb_substr() for full range of $start/$len
 *
 * @param    string        UTF-8 string.
 * @param    integer       Start position (character position).
 * @param    integer       Length (in characters).
 * @return   string        The substring.

 * @author    Martin Kutschker <martin.t.kutschker@blackbox.net>
 */
 function utf8_substr ($str, $start, $len=null)
 {
  if (!strcmp ($len,'0'))
   return '';
  
  $byte_start = @utf8_char2byte_pos ($str, $start);
  if ($byte_start === false)
  {
   if ($start > 0)
   {
    return false; // $start outside string length.
   }
   else
   {
    $start = 0;
   }
  }
  
  $str = substr ($str, $byte_start);
  
  if ($len != null)
  {
   $byte_end = @utf8_char2byte_pos ($str, $len);
   if ($byte_end === false)      // $len outside actual string length.
    return $len < 0 ? '' : $str; // When length is less than zero and exceeds, then we return blank string.
   else
    return substr ($str, 0, $byte_end);
  }
  else
   return $str;
 }

 // generates a random password of the specified length.
 function make_password ($length)
 {
  $pass = "";

  $chars = array ("1","2","3","4","5","6","7","8","9","0",
                  "a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
                  "k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
                  "u","U","v","V","w","W","x","X","y","Y","z","Z");

  $count = count ($chars) - 1;

  srand ((double) microtime () * 1000000);

  for ($i = 0; $i < $length; $i++)
  {
   $pass .= $chars[rand (0, $count)];
  }

  return ($pass);
 }
?>
