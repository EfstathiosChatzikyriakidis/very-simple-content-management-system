<?php

 // the following functions fetches data
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

 // query database for a list of categories.
 function get_categories ($mode = "normal")
 {
  // check to see if there is a mode.
  if (!var_exist ($mode))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_categories(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // select the appropriate records.
  if ($mode == "normal")
   $query = 'select * from content_categories where cat_pid=0 and cat_visibility=1';
  else
   $query = 'select * from content_categories';

  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_categories(). ".$GLOBALS['sql_get_cat_select_error']; 
   return false;
  }

  $num_cats = @mysql_num_rows ($result);
  if ($num_cats == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // query database for the name for a category id.
 function get_category_name ($catid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_category_name(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select cat_name from content_categories where cat_id = $catid";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_category_name(). ".$GLOBALS['sql_get_cat_name_select_error']; 
   return false;
  }

  $num_cats = @mysql_num_rows ($result);
  if ($num_cats == 0)
   return false;  

  $result = @mysql_result ($result, 0, 'cat_name');

  return clean_for_display ($result); 
 }

 // query database for the description for a category id.
 function get_category_description ($catid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_category_description(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select cat_description from content_categories where cat_id = $catid"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_category_description(). ".$GLOBALS['sql_get_cat_des_select_error']; 
   return false;
  }

  $num_cats = @mysql_num_rows ($result);
  if ($num_cats == 0)
   return false;  

  $result = @mysql_result ($result, 0, 'cat_description');

  return clean_for_display ($result); 
 }

 // query database for the graphics for a category id.
 function get_category_graphic ($catid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_category_graphic(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select cat_graphic from content_categories where cat_id = $catid"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_category_graphic(). ".$GLOBALS['sql_get_cat_graphic_select_error']; 
   return false;
  }

  $num_cats = @mysql_num_rows ($result);
  if ($num_cats == 0)
   return false;  

  $result = @mysql_result ($result, 0, 'cat_graphic');

  return clean_for_display ($result); 
 }

 // query database for all details for a particular category.
 function get_category_details ($catid)
 {
  // check to see if there is a catid.
  if (!var_exist ($catid))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_category_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from content_categories where cat_id='$catid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_category_details(). ".$GLOBALS['sql_get_cat_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // query database for the contents in a category.
 function get_contents ($catid = "all")
 {
  // check to see if there is a catid.
  if (!var_exist ($catid))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo d_s (40, 1) . "*** get_contents(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // select the appropriate records.
  if ($catid == "all")
   $query = "select * from content_items order by cat_id, con_visibility, con_date, con_time";
  else
   $query = "select * from content_items where cat_id='$catid' and con_visibility=1 order by con_date desc, con_time desc, con_hits desc";

  $result = @mysql_query ($query);
  if (!$result)
  {
   echo d_s (40, 1) . "*** get_contents(). ".$GLOBALS['sql_get_contents_select_error']; 
   return false;
  }

  $num_con = @mysql_num_rows ($result);
  if ($num_con == 0)
   return false;

  $result = db_result_to_array ($result);

  return $result;
 }

 // return the max cons that
 // a specific category has.
 function get_cat_num_contents ($catid)
 {
  // check to see if there is a catid.
  if (!var_exist ($catid))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_cat_num_contents(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // find how many cons
  // this category has.
  $query = "select count(*) from content_items where cat_id='$catid' and con_visibility=1";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_cat_num_contents(). ".$GLOBALS['sql_get_num_cat_cons_error']; 
   return false;
  }

  // get number of contents.
  $number = mysql_result ($result, 0, 0);

  // return number of contents.
  return $number;
 }

 // `$catid' is the id of the
 // category we want the path of.
 function get_cat_path ($catid)
 {
  // check to see if there is a catid.
  if (!var_exist ($catid))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_cat_path(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // look up the parent of this node.
  $query = "select cat_pid from content_categories where cat_id='$catid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_cat_path(). ".$GLOBALS['sql_get_cat_path_select_error']; 
   return false;
  }

  $row = mysql_fetch_array ($result);

  // save the path in this array.
  $path = array ();

  // only continue if this $catid isn't the
  // root node. (that's the node with no parent).
  if ($row['cat_pid'] != 0)
  {
   // the last part of the path to $catid,
   // is the name of the parent of $catid.
   $path[] = $row['cat_pid'];

   // we should add the path to the
   // parent of this node to the path.
   $path = array_merge (get_cat_path ($row['cat_pid']), $path);
  }

  // return the path.
  return $path;
 } 

 // the following function gets the
 // drop down list of categories.
 function get_cat_selectlist ($current_cat_id, $count, $visibility='show_all')
 {
  static $option_results;

  // if there is no current category id set,
  // start off at the top level (zero).
  if (!var_exist ($current_cat_id))
   $current_cat_id = 0;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_cat_selectlist(). ".$GLOBALS['sql_database_connect_error']."<br>";
   return false;
  }

  // increment the counter by 1
  $count = $count + 1;

  // query the database for the subcats
  // of whatever the parent category is.

  // if there is no visibility
  // set, get all the categories.
  if ($visibility == 'show_all')
   $query = "select cat_id, cat_name from content_categories where cat_pid = '$current_cat_id'";
  else
   $query = "select cat_id, cat_name from content_categories where cat_pid = '$current_cat_id' and cat_visibility = '$visibility'";

  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_cat_selectlist(). ".$GLOBALS['sql_get_cat_selectlist_select_error']."<br>";
   return false;
  }

  $num_options = mysql_num_rows ($result);

  // our category is apparently valid, so go ahead...
  if ($num_options > 0)
  { 
   while (list ($cat_id, $cat_name) = mysql_fetch_row ($result))
   {
    $indent_flag = '';

    // if its not a top-level category, indent
    // it to show that its a child category.
    if ($current_cat_id != 0)
    {
     for ($x = 2; $x <= $count; $x++)
     {
      $indent_flag .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
     } 
    }

    $cat_name = $indent_flag.$cat_name;
    $option_results[$cat_id] = $cat_name;

    // now call the function again, to
    // recurse through the child categories.
    if ($visibility == 'show_all')
     get_cat_selectlist ($cat_id, $count);
    else
     get_cat_selectlist ($cat_id, $count, $visibility);
   }
  } 

  return $option_results;
 } 

 // the following function gets the parent id. 
 function get_cat_parent ($id)
 {
  // check to see if there is a conid.
  if (!var_exist ($id))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_cat_parent(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select cat_pid from content_categories where cat_id = '$id'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_cat_parent(). ".$GLOBALS['sql_get_cat_parent_select_error']; 
   return false;
  }

  $row = mysql_fetch_row ($result);

  return $row[0];
 } 

 // query database for all details for a particular content.
 function get_content_details ($conid)
 {
  // check to see if there is a conid.
  if (!var_exist ($conid))
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_content_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from content_items where con_id='$conid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_content_details(). ".$GLOBALS['sql_get_con_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }
?>
