<?php

 // the following functions are administrative functions.

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

 // this function adds a new category.
 function add_new_category ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** add_new_category(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $cat_pid         = clean ($HTTP_POST_VARS['cat_pid']);
  $cat_name        = clean ($HTTP_POST_VARS['cat_name']);
  $cat_graphic     = clean ($HTTP_POST_VARS['cat_graphic']);
  $cat_description = clean ($HTTP_POST_VARS['cat_description']);

  // the category will be visible.
  $cat_visibility  = 1;

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $cat_name        == ''        ||
      $cat_description == ''        ||
      $cat_pid == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // is there any category with the same name?
  if (category_exists ($cat_name, $cat_pid))
  {
   // add the category here.
   $sql = "INSERT INTO content_categories VALUES (null, '".$cat_pid."', '".$cat_name."', '".$cat_graphic."', '".$cat_description."', '".$cat_visibility."')";
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** add_new_category(). ".$GLOBALS['sql_add_cat_insert_error'];
    return false;
   }

   echo $GLOBALS['gui_admin_category_added'];
  }

  return true;
 }

 // this function adds a new content.
 function add_new_content ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** add_new_content(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $cat_id          = clean  ($HTTP_POST_VARS['cat_id']);
  $con_graphic     = clean  ($HTTP_POST_VARS['con_graphic']);
  $con_base_title  = clean  ($HTTP_POST_VARS['con_base_title']);
  $con_des_title   = clean  ($HTTP_POST_VARS['con_des_title']);
  $con_text        = pretty ($HTTP_POST_VARS['con_text']);

  // the content will be visible and will have zero hits.
  $con_visibility  = 1;
  $con_hits  = 0;

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $con_base_title     == ''     ||
      $con_des_title      == ''     ||
      $con_text           == ''     ||
      $cat_id             == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // is there any content with the
  // same name in this category ?
  if (content_exists ($con_base_title, $cat_id))
  {
   // add the content here.
   $sql = "INSERT INTO content_items VALUES (null, $cat_id, '".$con_graphic."', '".$con_base_title."', '".$con_des_title."', '".$con_text."', '".$con_hits."', '".$con_visibility."', CURDATE(), CURTIME(), CURDATE(), CURTIME())"; 
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** add_new_content(). ".$GLOBALS['sql_add_con_insert_error'];
    return false;
   }

   echo $GLOBALS['gui_admin_content_added'];
  }

  return true;
 }

 // this function adds a new graphic link.
 function add_graphic_link ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** add_graphic_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $title   = clean ($HTTP_POST_VARS['title']);
  $graphic = clean ($HTTP_POST_VARS['graphic']);
  $url     = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $title   == ''                ||
      $url     == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // is there any graphic link like the one given?
  if (graphic_link_exists ($title, $url))
  {
   // add the graphic link here.
   $sql = "INSERT INTO graphic_links VALUES (null, '".$url."', '".$graphic."', '".$title."')"; 
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** add_graphic_link(). ".$GLOBALS['sql_add_graphic_insert_error'];
    return false;
   }

   echo $GLOBALS['gui_admin_graphic_link_added'];
  }

  return true;
 }

 // this function adds a text link.
 function add_text_link ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** add_text_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $title = clean ($HTTP_POST_VARS['title']);
  $name  = clean ($HTTP_POST_VARS['name']);
  $url   = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $title == ''                  ||
      $name  == ''                  ||
      $url   == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // is there any text link like the one given?
  if (text_link_exists ($name, $url))
  {
   // add the text link here.
   $sql = "INSERT INTO text_links VALUES (null, '".$url."', '".$title."', '".$name."')"; 
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** add_text_link(). ".$GLOBALS['sql_add_text_insert_error'];
    return false;
   }

   echo $GLOBALS['gui_admin_text_link_added'];
  }

  return true;
 }

 // this function adds a new banner link.
 function add_banner_link ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** add_banner_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $title   = clean ($HTTP_POST_VARS['title']);
  $graphic = clean ($HTTP_POST_VARS['graphic']);
  $url     = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $title   == ''                ||
      $url     == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // is there any banner link like the one given?
  if (banner_link_exists ($title, $url))
  {
   // add the banner link here.
   $sql = "INSERT INTO banner_links VALUES (null, '".$url."', '".$graphic."', '".$title."')"; 
   $result = @mysql_query ($sql);
   if (!$result)
   {
    echo "*** add_banner_link(). ".$GLOBALS['sql_add_banner_insert_error'];
    return false;
   }

   echo $GLOBALS['gui_admin_banner_link_added'];
  }

  return true;
 }

 // this function checks if there is 
 // already a category with the same
 // name in a specific subcategory.
 function category_exists ($cat_name, $cat_pid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** category_exists(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // try to have all categories with the same name.
  $query = "select count(*) from content_categories where cat_name = '$cat_name' and cat_pid = '$cat_pid'"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** category_exists(). ".$GLOBALS['sql_cat_exists_select_error'];
   return false;
  }

  // check to see if exists.
  if (mysql_result ($result, 0, 0) > 0)
  {
   echo $GLOBALS['gui_admin_category_exists'];
   return false;
  }

  // there isn't any category with this name.
  return true;  
 }

 // this function checks if there is 
 // already a content with the same
 // name in a specific category.
 function content_exists ($con_base_title, $cat_id)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** content_exists(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // try to have all contents with the same name.
  $query = "select count(*) from content_items where con_base_title = '$con_base_title' and cat_id = $cat_id"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** content_exists(). ".$GLOBALS['sql_con_exists_select_error']; 
   return false;
  }

  // check to see if exists.
  if (mysql_result ($result, 0, 0) > 0)
  {
   echo $GLOBALS['gui_admin_content_exists'];
   return false;
  }

  // there isn't any content with this name.
  return true;
 }

 // this function checks if there is
 // already a graphic link like the
 // one given.
 function graphic_link_exists ($title, $url)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** graphic_link_exists(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // try to have all graphic links with the same name.
  $query = "select count(*) from graphic_links where title='$title' and url='$url'"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** graphic_link_exists(). ".$GLOBALS['sql_graphic_exists_select_error']; 
   return false;
  }

  // check to see if exists.
  if (mysql_result ($result, 0, 0) > 0)
  {
   echo $GLOBALS['gui_admin_link_exists'];
   return false;
  }

  // there isn't any graphic link with this name.
  return true;
 }

 // this function checks if there is
 // already a text link like the one
 // given.
 function text_link_exists ($name, $url)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** text_link_exists(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // try to have all text links with the same name.
  $query = "select count(*) from text_links where text='$name' and url='$url'"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** text_link_exists(). ".$GLOBALS['sql_text_exists_select_error']; 
   return false;
  }

  // check to see if exists.
  if (mysql_result ($result, 0, 0) > 0)
  {
   echo $GLOBALS['gui_admin_link_exists'];
   return false;
  }

  // there isn't any text link with this name.
  return true;
 }

 // this function checks if there is
 // already a banner link like the
 // one given.
 function banner_link_exists ($title, $url)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** banner_link_exists(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // try to have all banner links with the same name.
  $query = "select count(*) from banner_links where title='$title' and url='$url'"; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** banner_link_exists(). ".$GLOBALS['sql_banner_exists_select_error']; 
   return false;
  }

  // check to see if exists.
  if (mysql_result ($result, 0, 0) > 0)
  {
   echo $GLOBALS['gui_admin_link_exists'];
   return false;
  }

  // there isn't any banner link like the one given.
  return true;
 }

 // this function changes a category.
 function change_category ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_category(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $cat_id          = clean ($HTTP_POST_VARS['cat_id']);
  $cat_pid         = clean ($HTTP_POST_VARS['cat_pid']);
  $cat_graphic     = clean ($HTTP_POST_VARS['cat_graphic']);
  $cat_name        = clean ($HTTP_POST_VARS['cat_name']);
  $cat_description = clean ($HTTP_POST_VARS['cat_description']);
  $cat_visibility  = clean ($HTTP_POST_VARS['cat_visibility']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $cat_name        == ''        ||
      $cat_description == ''        ||
      $cat_visibility  == ''        ||
      $cat_pid         == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // fix error! get the parent id.
  if ($cat_id == $cat_pid)
   $cat_pid = get_cat_parent ($cat_id);

  // update the category here.
  $sql = "UPDATE content_categories SET cat_pid='$cat_pid', cat_name='$cat_name', cat_graphic='$cat_graphic', cat_visibility='$cat_visibility', cat_description='$cat_description' WHERE cat_id='$cat_id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_category(). ".$GLOBALS['sql_change_cat_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_category_updated'];

  return true;
 }

 // this function changes a content.
 function change_content ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_content(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $cat_id         = clean  ($HTTP_POST_VARS['cat_id']);
  $con_id         = clean  ($HTTP_POST_VARS['con_id']);
  $con_graphic    = clean  ($HTTP_POST_VARS['con_graphic']);
  $con_visibility = clean  ($HTTP_POST_VARS['con_visibility']);
  $con_base_title = clean  ($HTTP_POST_VARS['con_base_title']);
  $con_des_title  = clean  ($HTTP_POST_VARS['con_des_title']);
  $con_text       = pretty ($HTTP_POST_VARS['con_text']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) ||
      $con_base_title     == ''     ||
      $con_des_title      == ''     ||
      $con_text           == ''     ||
      $con_visibility     == ''     ||
      $cat_id             == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the content here.
  $sql = "UPDATE content_items SET cat_id='$cat_id', con_graphic='$con_graphic', con_base_title='$con_base_title', con_des_title='$con_des_title', con_visibility='$con_visibility', con_change_date=CURDATE(), con_change_time=CURTIME(), con_text='$con_text' WHERE con_id='$con_id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_content(). ".$GLOBALS['sql_change_con_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_content_updated'];

  return true;
 }

 // this function changes a text link.
 function change_text_link ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_text_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id    = clean ($HTTP_POST_VARS['link_id']);
  $name  = clean ($HTTP_POST_VARS['name']);
  $title = clean ($HTTP_POST_VARS['title']);
  $url   = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $name  == ''                  ||
      $title == ''                  ||
      $url   == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the text link here.
  $sql = "UPDATE text_links SET text='$name', title='$title', url='$url' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_text_link(). ".$GLOBALS['sql_change_text_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_text_link_updated'];

  return true;
 }

 // this function changes a banner link.
 function change_banner_link ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_banner_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id      = clean ($HTTP_POST_VARS['link_id']);
  $title   = clean ($HTTP_POST_VARS['title']);
  $graphic = clean ($HTTP_POST_VARS['graphic']);
  $url     = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $title   == ''                ||
      $url     == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the banner link here.
  $sql = "UPDATE banner_links SET title='$title', graphic='$graphic', url='$url' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_banner_link(). ".$GLOBALS['sql_change_banner_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_banner_link_updated'];

  return true;
 }

 // this function changes a corner item.
 function change_corner_item ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_corner_item(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id      = clean ($HTTP_POST_VARS['item_id']);
  $title   = clean ($HTTP_POST_VARS['title']);
  $graphic = clean ($HTTP_POST_VARS['graphic']);
  $url     = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $title   == ''                ||
      $url     == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  if ($graphic == 'no')
   {
    echo "<u>".$GLOBALS['gui_admin_must_select_graphic']."</u>";
    return false;
   }

  // update the corner item here.
  $sql = "UPDATE corner_items SET title='$title', graphic='$graphic', url='$url' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_corner_item(). ".$GLOBALS['sql_change_corner_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_corner_updated'];

  return true;
 }

 // this function changes a page counter.
 function change_page_counter ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_page_counter(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id   = clean ($HTTP_POST_VARS['counter_id']);
  $hits = clean ($HTTP_POST_VARS['hits']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || $hits == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the page counter here.
  $sql = "UPDATE page_counters SET hits='$hits' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_page_counter(). ".$GLOBALS['sql_change_page_counter_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_page_counter_updated'];

  return true;
 }

 // this function changes a component.
 function change_comp ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_comp(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id     = clean ($HTTP_POST_VARS['item_id']);
  $status = clean ($HTTP_POST_VARS['comp_status']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || $status == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the component here.
  $sql = "UPDATE components_status SET comp_status='$status' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_comp(). ".$GLOBALS['sql_change_comp_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_component_updated'];

  return true;
 }

 // this function changes a graphic link.
 function change_graphic_link ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_graphic_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id      = clean ($HTTP_POST_VARS['link_id']);
  $name    = clean ($HTTP_POST_VARS['name']);
  $graphic = clean ($HTTP_POST_VARS['graphic']);
  $url     = clean ($HTTP_POST_VARS['url']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) || 
      $name    == ''                ||
      $url     == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the graphic link here.
  $sql = "UPDATE graphic_links SET title='$name', graphic='$graphic', url='$url' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_graphic_link(). ".$GLOBALS['sql_change_graphic_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_graphic_link_updated'];

  return true;
 }

 // this function changes an adjustment.
 function change_adjust_info ($HTTP_POST_VARS)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** change_adjust_info(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  // create short variable names.
  $id                    = clean  ($HTTP_POST_VARS['info_id']);

  $client_email_address  = clean  ($HTTP_POST_VARS['client_email_address']);
  $develo_email_address  = clean  ($HTTP_POST_VARS['develo_email_address']);
  $client_email_nospam   = clean  ($HTTP_POST_VARS['client_email_nospam']);
  $develo_email_nospam   = clean  ($HTTP_POST_VARS['develo_email_nospam']);

  $holy_host_name        = clean  ($HTTP_POST_VARS['holy_host_name']);
  $holy_port_number      = clean  ($HTTP_POST_VARS['holy_port_number']);
  $holy_repeat_number    = clean  ($HTTP_POST_VARS['holy_repeat_number']);

  $top_center_item_title = clean  ($HTTP_POST_VARS['top_center_item_title']);
  $left_column_title     = clean  ($HTTP_POST_VARS['left_column_title']);
  $main_column_title     = clean  ($HTTP_POST_VARS['main_column_title']);

  $text_links_number     = clean  ($HTTP_POST_VARS['text_links_number']);

  $graphic_links_number  = clean  ($HTTP_POST_VARS['graphic_links_number']);
  $graphic_links_cols    = clean  ($HTTP_POST_VARS['graphic_links_cols']);

  $banner_links_number   = clean  ($HTTP_POST_VARS['banner_links_number']);
  $banner_links_cols     = clean  ($HTTP_POST_VARS['banner_links_cols']);

  $content_days_new      = clean  ($HTTP_POST_VARS['content_days_new']);

  $main_column_welcome   = pretty ($HTTP_POST_VARS['main_column_welcome']);

  // is there any empty item?
  if (!filled_out ($HTTP_POST_VARS) ||
      $client_email_address  == ''  ||
      $develo_email_address  == ''  ||
      $client_email_nospam   == ''  ||
      $develo_email_nospam   == ''  ||
      $holy_host_name        == ''  ||
      $holy_port_number      == ''  ||
      $holy_repeat_number    == ''  ||
      $top_center_item_title == ''  ||
      $left_column_title     == ''  ||
      $main_column_title     == ''  ||
      $text_links_number     == ''  ||
      $graphic_links_number  == ''  ||
      $graphic_links_cols    == ''  ||
      $banner_links_number   == ''  ||
      $banner_links_cols     == ''  ||
      $content_days_new      == ''  ||
      $main_column_welcome   == '')
  {
   echo $GLOBALS['gui_fill_all_fields'].'<br><br>'.$GLOBALS['gui_try_again'];
   return false;
  }

  // update the adjustment here.
  $sql = "UPDATE adjust_info SET client_email_address='$client_email_address', develo_email_address='$develo_email_address', client_email_nospam='$client_email_nospam', develo_email_nospam='$develo_email_nospam', holy_host_name='$holy_host_name', holy_port_number='$holy_port_number', holy_repeat_number='$holy_repeat_number', top_center_item_title='$top_center_item_title', left_column_title='$left_column_title', main_column_title='$main_column_title', text_links_number='$text_links_number', graphic_links_number='$graphic_links_number', banner_links_number='$banner_links_number', graphic_links_cols='$graphic_links_cols', banner_links_cols='$banner_links_cols', main_column_welcome='$main_column_welcome', content_days_new='$content_days_new' WHERE id='$id'";
  $result = @mysql_query ($sql);
  if (!$result)
  {
   echo "*** change_adjust_info(). ".$GLOBALS['sql_change_adjust_update_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_adjust_updated'];

  return true;
 }

 // remove the category identified by `$catid' from the
 // db. if there are contents in the category, it will
 // not be removed and the function will return.
 function remove_category ($catid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_category(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }
   
  // check if there are any contents in category to avoid deletion anomalies.
  $query  = "SELECT COUNT(*) FROM content_items WHERE cat_id='$catid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_category(). ".$GLOBALS['sql_remove_cat_select_error'];
   return false;
  }

  // check to see there are any content.
  if (mysql_result ($result, 0, 0) > 0)
  {
   echo "<u>".$GLOBALS['gui_admin_cat_must_not_have_cons']."</u>";
   return false;
  }

  $query  = "DELETE FROM content_categories WHERE cat_id='$catid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_category(). ".$GLOBALS['sql_remove_cat_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_category_delete'];

  return true;
 }

 // removes the content identified by `$conid' from the database.
 function remove_content ($conid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_content(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM content_items WHERE con_id='$conid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_content(). ".$GLOBALS['sql_remove_con_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_content_delete'];

  return true;
 }

 // removes the graphic link identified by `$linkid' from the database.
 function remove_graphic_link ($linkid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_graphic_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM graphic_links WHERE id='$linkid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_graphic_link(). ".$GLOBALS['sql_remove_graphic_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_graphic_link_delete'];

  return true;
 }

 // removes the text link identified by `$linkid' from the database.
 function remove_text_link ($linkid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_text_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM text_links WHERE id='$linkid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_text_link(). ".$GLOBALS['sql_remove_text_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_text_link_delete'];

  return true;
 }

 // removes the page_counter identified by `$counterid' from the database.
 function remove_page_counter ($counterid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_page_counter(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM page_counters WHERE id='$counterid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_page_counter(). ".$GLOBALS['sql_remove_page_counter_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_page_counter_delete'];

  return true;
 }

 // removes the banner link identified by `$linkid' from the database.
 function remove_banner_link ($linkid)
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_banner_link(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM banner_links WHERE id='$linkid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_banner_link(). ".$GLOBALS['sql_remove_banner_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_banner_link_delete'];

  return true;
 }

 // removes all the banner links from the database.
 function remove_banner_links ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_banner_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM banner_links";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_banner_links(). ".$GLOBALS['sql_remove_all_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_banner_links_delete'];

  return true;
 }

 // removes all the contents from the database.
 function remove_all_contents ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_all_contents(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM content_items";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_all_contents(). ".$GLOBALS['sql_remove_all_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_contents_delete'];

  return true;
 }

 // removes all the page counters from the database.
 function remove_all_page_counters ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_all_page_counters(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM page_counters";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_all_page_counters(). ".$GLOBALS['sql_remove_all_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_page_counters_delete'];

  return true;
 }

 // removes all the categories from the database.
 function remove_all_categories ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_all_categories(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM content_categories";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_all_categories(). ".$GLOBALS['sql_remove_all_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_categories_delete'];

  return true;
 }

 // removes all the text links from the database.
 function remove_text_links ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_text_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM text_links";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_text_links(). ".$GLOBALS['sql_remove_all_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_text_links_delete'];

  return true;
 }

 // removes all the graphic links from the database.
 function remove_graphic_links ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** remove_graphic_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query  = "DELETE FROM graphic_links";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** remove_graphic_links(). ".$GLOBALS['sql_remove_all_delete_error'];
   return false;
  }

  echo $GLOBALS['gui_admin_graphic_links_delete'];

  return true;
 }

 // query database for a list of text links.
 function get_text_links ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_text_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = 'select * from text_links'; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_text_links(). ".$GLOBALS['sql_get_texts_select_error']; 
   return false;
  }

  $num_links = @mysql_num_rows ($result);
  if ($num_links == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // query database for a list of page counters.
 function get_page_counters ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_page_counters(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = 'select * from page_counters'; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_page_counters(). ".$GLOBALS['sql_get_page_counters_select_error']; 
   return false;
  }

  $num_counters = @mysql_num_rows ($result);
  if ($num_counters == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // query database for a list of graphic links.
 function get_graphic_links ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_graphic_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = 'select * from graphic_links'; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_graphic_links(). ".$GLOBALS['sql_get_graphics_select_error']; 
   return false;
  }

  $num_links = @mysql_num_rows ($result);
  if ($num_links == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // query database for a list of banner links.
 function get_banner_links ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_banner_links(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = 'select * from banner_links'; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_banner_links(). ".$GLOBALS['sql_get_banners_select_error']; 
   return false;
  }

  $num_links = @mysql_num_rows ($result);
  if ($num_links == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // query database for a list of corner items.
 function get_corner_items ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_corner_items(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = 'select * from corner_items'; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_corner_items(). ".$GLOBALS['sql_get_corners_select_error']; 
   return false;
  }

  $num_items = @mysql_num_rows ($result);
  if ($num_items == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // query database for a list of components status.
 function get_comps ()
 {
  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_comps(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = 'select * from components_status'; 
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_comps(). ".$GLOBALS['sql_get_comps_select_error']; 
   return false;
  }

  $num_items = @mysql_num_rows ($result);
  if ($num_items == 0)
   return false;  

  $result = db_result_to_array ($result);

  return $result;
 }

 // display all graphic links in the array passed in.
 function display_graphic_links ($links_array, $links_url)
 {
  // is there any graphic link?
  if (!is_array ($links_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_graphic_links'];
   return false;
  }

  echo '<table cellpadding="0" cellspacing="0" border="0" summary="">';
  echo ' <tbody>';
  echo '  <tr>';
  echo '   <td width="6"></td>';
  echo '   <td>';
  echo '    <table cellpadding="0" cellspacing="8" border="0" summary="">';
  echo '     <tbody>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each graphic link.    
  foreach ($links_array as $row)
  {
   $url_path = $links_url.'?linkid='.($row['id']);

   $del_url    = FILENAME_REMOVE_GRAPHIC.'?linkid='.($row['id']);
   $del_text   = "[ <b>x</b> ]";

   echo ' <tr>';
   echo '  <td>'. ++$i.'.</td>';
   echo '  <td align="center">';
   echo '   <a href="'.$url_path.'" target="_self" title="'.clean_for_display ($row['title']).'">';

   // check to see if the graphic file exists.
   if (@file_exists (DIR_PARENT.DIR_PARENT.DIR_LINKS.clean_for_display ($row["graphic"])))
   {
    echo '<img src="'.DIR_PARENT.DIR_PARENT.DIR_LINKS. clean_for_display ($row["graphic"]).'" ';
    echo 'width="60" height="75" border="1" alt="'.clean_for_display ($row["title"]).'">';
   }
   else
    echo '&nbsp;&nbsp;'.$GLOBALS['there_is_no_graphic'].'&nbsp;&nbsp;';

   echo '   </a>';
   echo '  </td>';
   echo '  <td align="center">'.do_html_url ($del_url, $del_text, '', "_self", 'onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');"').'</td>';
   echo ' </tr>';
  }

  echo '     </tbody>';
  echo '    </table>';
  echo '   </td>';
  echo '  </tr>';
  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all text links in the array passed in.
 function display_text_links ($links_array, $links_url)
 {
  // is there any text link?
  if (!is_array ($links_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_text_links'];
   return false;
  }

  echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
  echo ' <tbody>';
  echo '  <tr bgcolor="#2c2c39">';
  echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_admin_table_text_links_title'].'</td><td align="center">Χ</td>';
  echo '  </tr>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each text link.    
  foreach ($links_array as $row)
  {
   $url_path   = $links_url.'?linkid='.($row['id']);

   $del_url    = FILENAME_REMOVE_TEXT.'?linkid='.($row['id']);
   $del_text   = "[ <b>x</b> ]";

   echo ' <tr bgcolor="#1c1c19">';
   echo '  <td width="25" align="center">'.++$i.'.</td>';
   echo '  <td>';
   echo '   <a href="'.$url_path.'" target="_self" title="'.clean_for_display ($row['title']).'">';
   echo      clean_for_display ($row['text']);
   echo '   </a>';
   echo '  </td>';
   echo '  <td align="center">'.do_html_url ($del_url, $del_text, '', "_self", 'onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');"').'</td>';
   echo ' </tr>';
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }


 // display all page counters in the array passed in.
 function display_page_counters ($counters_array, $counters_url)
 {
  // is there any page counter?
  if (!is_array ($counters_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_page_counters'];
   return false;
  }

  echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
  echo ' <tbody>';
  echo '  <tr bgcolor="#2c2c39">';
  echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_admin_table_page_counters_path'].'</td><td>'.$GLOBALS['gui_admin_table_page_counters_hits'].'</td><td align="center">Χ</td>';
  echo '  </tr>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each page counter.
  foreach ($counters_array as $row)
  {
   $url_path   = $counters_url.'?counterid='.($row['id']);

   $del_url    = FILENAME_REMOVE_PAGE_COUNTER.'?counterid='.($row['id']);
   $del_text   = "[ <b>x</b> ]";

   echo ' <tr bgcolor="#1c1c19">';
   echo '  <td align="center">'.++$i.'.</td>';
   echo '  <td>';
   echo '   <b><a href="'.$url_path.'" target="_self">';
   echo      clean_for_display ($row['page_path']);
   echo '   </a></b>';
   echo '  </td>';
   echo '  <td align="center">'. $row['hits'].'</td>';
   echo '  <td align="center">'.do_html_url ($del_url, $del_text, '', "_self", 'onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');"').'</td>';
   echo ' </tr>';
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all banner links in the array passed in.
 function display_banner_links ($links_array, $links_url)
 {
  // is there any banner link?
  if (!is_array ($links_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_banner_links'];
   return false;
  }

  echo '<table cellpadding="0" cellspacing="10" border="0" summary="">';
  echo ' <tbody>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each banner link.    
  foreach ($links_array as $row)
  {
   $url_path = $links_url.'?linkid='.($row['id']);

   $del_url    = FILENAME_REMOVE_BANNER.'?linkid='.($row['id']);
   $del_text   = "[ <b>x</b> ]";

   echo ' <tr>';
   echo '  <td>'.++$i.'.</td>';
   echo '  <td align="center">';
   echo '   <a href="'.$url_path.'" target="_self" title="'.clean_for_display ($row['title']).'">';

   // check to see if the graphic file exists.
   if (@file_exists (DIR_PARENT.DIR_PARENT.DIR_BANNERS.clean_for_display ($row["graphic"])))
   {
    echo '<img src="'.DIR_PARENT.DIR_PARENT.DIR_BANNERS.clean_for_display ($row["graphic"]).'" ';
    echo 'width="88" height="31" border="0" alt="'.clean_for_display ($row["title"]).'">';
   }
   else
    echo $GLOBALS['there_is_no_graphic'];

   echo '   </a>';
   echo '  </td>';
   echo '  <td>'.do_html_url ($del_url, $del_text, '', "_self", 'onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');"').'</td>';
   echo ' </tr>';
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all corner items in the array passed in.
 function display_corner_items ($items_array, $items_url)
 {
  // is there any corner item?
  if (!is_array ($items_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_corners'];
   return false;
  }

  echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
  echo ' <tbody>';
  echo '  <tr bgcolor="#2c2c39">';
  echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_admin_table_corners_graphic'].'</td><td>'.$GLOBALS['gui_admin_table_corners_height_pos'].'</td><td>'.$GLOBALS['gui_admin_table_corners_width_pos'].'</td>';
  echo '  </tr>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each corner item.    
  foreach ($items_array as $row)
  {
   $url_path = $items_url.'?itemid='.($row['id']);

   echo ' <tr align="center" bgcolor="#1c1c19">';
   echo '  <td>'.++$i.'.</td>';
   echo '  <td>';
   echo '   <a href="'.$url_path.'" target="_self" title="'.clean_for_display ($row['title']).'">';

   // check to see if the graphic file exists.
   if (@file_exists (DIR_PARENT.DIR_PARENT.TEMPLATE.DIR_CORNERS.clean_for_display ($row['graphic'])))
   {
    echo '<img src="'.DIR_PARENT.DIR_PARENT.TEMPLATE.DIR_CORNERS.clean_for_display ($row['graphic']).'" border="0" width="81" height="41" alt="'.clean_for_display ($row["title"]).'">';
   }
   else
    echo $GLOBALS['there_is_no_graphic'];

   echo '   </a>';
   echo '  </td>';
   echo '  <td><b>'.$row['valign'].'</b></td>';
   echo '  <td><b>'.$row['align'].'</b></td>';
   echo ' </tr>';
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all components in the array passed in.
 function display_comps ($comps_array, $comps_url)
 {
  // is there any component?
  if (!is_array ($comps_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_components'];
   return false;
  }

  echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
  echo ' <tbody>';
  echo '  <tr bgcolor="#2c2c39">';
  echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_admin_table_comp_component'].'</td><td>'.$GLOBALS['gui_admin_table_comp_situation'].'</td>';
  echo '  </tr>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each component.
  foreach ($comps_array as $row)
  {
   $url_path = $comps_url.'?itemid='.($row['id']);

   echo ' <tr align="center" bgcolor="#1c1c19">';
   echo '  <td>'.++$i.'.</td>';
   echo '  <td>';
   echo '   <b><a href="'.$url_path.'" target="_self">';
   echo      clean_for_display ($row['comp_name']);
   echo '   </a></b>';
   echo '  </td>';
   echo '  <td>'.($row['comp_status'] ? $GLOBALS['gui_yes_txt'] : $GLOBALS['gui_no_txt']).'</td>';
   echo ' </tr>';
  }

  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all contents in the array passed in. (admin version).
 function display_contents_admin ($content_array, $con_url)
 {
  // is there any content?
  if (!is_array ($content_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_cons'];
   return false;
  }

  echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
  echo ' <tbody>';
  echo '  <tr bgcolor="#2c2c39">';
  echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_admin_table_content_visibility'].'</td><td>'.$GLOBALS['gui_admin_table_content_title'].'</td><td align="center">Χ</td><td>'.$GLOBALS['gui_admin_table_content_category'].'</td>';
  echo '  </tr>';

  // the following var is used for looping.
  $i = '';

  // create a table row for each content.    
  foreach ($content_array as $row)
  {
   // category name.
   $cat_name   = get_category_name ($row['cat_id']);

   // update link.
   $url_path   = $con_url.'?conid='.($row['con_id']);
   $url_title  = clean_for_display ($row['con_des_title']); 
   $url_target = "_self";
   $text       = clean_for_display ($row['con_base_title']);
   $visibility = $row['con_visibility'];

   // remove link.
   $del_url    = FILENAME_REMOVE_CON.'?conid='.($row['con_id']);
   $del_text   = "[ <b>x</b> ]";
   $del_target = "main_column";

   echo ' <tr bgcolor="#1c1c19">';
   echo '  <td width="25" align="center">'.++$i.'.'.'</td>';
   echo '  <td align="center">'.($row['con_visibility'] ? '<img src="'.DIR_PARENT.DIR_PARENT.DIR_GRAPHICS."visible-green.png".'" border="0" alt="">' : '<img src="'.DIR_PARENT.DIR_PARENT.DIR_GRAPHICS."invisible-red.png".'" border="0" alt="">').'</td>';
   echo '  <td>'.do_html_url ($url_path, $text, $url_title, $url_target).'.</td>';
   echo '  <td align="center" nowrap>'.do_html_url ($del_url, $del_text, '', $del_target, 'onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');"').'</td>';
   echo '  <td nowrap>[ '.$cat_name.' ]</td>';
  }

  echo '  </tr>';
  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // display all contents in the array passed in. (print version).
 function display_contents_print ($content_array)
 {
  // is there any content?
  if (!is_array ($content_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_cons'];
   return false;
  }

  echo ' <ol>';

  // create a table row for each content.    
  foreach ($content_array as $row)
  {
   $text = clean_for_display ($row['con_base_title']);
   echo ' <li>'.$text.'.</li>';
  }

  echo ' </ol>';

  return true;
 }

 // display all categories as links. (admin version).
 function display_categories_admin ($cat_array, $cat_url)
 {
  // is there any category?
  if (!is_array ($cat_array))
  {
   echo '<br><br>'.$GLOBALS['there_are_no_cats'];
   return false;
  }

  echo '<table cellpadding="5" cellspacing="0" border="1" summary="">';
  echo ' <tbody>';
  echo '  <tr bgcolor="#2c2c39">';
  echo '   <td align="center">'.$GLOBALS['gui_increasing_number'].'</td><td>'.$GLOBALS['gui_admin_table_content_visibility'].'</td><td>'.$GLOBALS['gui_admin_table_category_name'].'</td><td align="center">Χ</td>';
  echo '  </tr>';

  // the following var is used for looping.
  $i = '';

  // create each url link for each category.
  foreach ($cat_array as $row)
  {
   // update link.
   $show_url    = $cat_url.'?catid='.($row['cat_id']);
   $show_text   = clean_for_display ($row['cat_name']); 
   $show_title  = clean_for_display ($row['cat_description']);
   $show_target = "main_column";

   // remove link.
   $del_url  = FILENAME_REMOVE_CAT.'?catid='.($row['cat_id']);
   $del_text = "[ <b>x</b> ]";
   $del_target   = "main_column";

   // print category details.
   echo  ' <tr bgcolor="#1c1c19">';
   echo  '  <td align="center" width="20">'. ++$i.'.'.'</td>';
   echo  '  <td align="center" width="20">'.($row['cat_visibility'] ? '<img src="'.DIR_PARENT.DIR_PARENT.DIR_GRAPHICS."visible-green.png".'" border="0" alt="">' : '<img src="'.DIR_PARENT.DIR_PARENT.DIR_GRAPHICS."invisible-red.png".'" border="0" alt="">').'</td>';
   echo  '  <td nowrap>'.do_html_url ($show_url, $show_text, $show_title, $show_target).'.</td>';
   echo  '  <td align="center" nowrap>'.do_html_url ($del_url, $del_text, '', $del_target, 'onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');"').'</td>';
  }

  echo  ' </tr>';
  echo ' </tbody>';
  echo '</table>';

  return true;
 }

 // query database for all details for a particular graphic link.
 function get_graphic_link_details ($linkid)
 {
  // check to see if there is a linkid.
  if (!$linkid || $linkid == '')
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_graphic_link_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from graphic_links where id='$linkid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_graphic_link_details(). ".$GLOBALS['sql_get_graphic_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // query database for all details for a particular text link.
 function get_text_link_details ($linkid)
 {
  // check to see if there is a linkid.
  if (!$linkid || $linkid == '')
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_text_link_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from text_links where id='$linkid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_text_link_details(). ".$GLOBALS['sql_get_text_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // query database for all details for a particular page counter.
 function get_page_counter_details ($counterid)
 {
  // check to see if there is a counterid.
  if (!$counterid || $counterid == '')
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_page_counter_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from page_counters where id='$counterid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_page_counter_details(). ".$GLOBALS['sql_get_page_counter_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // query database for all details for a particular corner item.
 function get_corner_item_details ($itemid)
 {
  // check to see if there is a itemid.
  if (!$itemid || $itemid == '')
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_corner_item_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from corner_items where id='$itemid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_corner_item_details(). ".$GLOBALS['sql_get_corner_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // query database for all details for a particular component.
 function get_comp_details ($itemid)
 {
  // check to see if there is a component.
  if (!$itemid || $itemid == '')
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_comp_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from components_status where id='$itemid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_comp_details(). ".$GLOBALS['sql_get_comp_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // query database for all details for a particular banner link.
 function get_banner_link_details ($linkid)
 {
  // check to see if there is a linkid.
  if (!$linkid || $linkid == '')
   return false;

  // try to connect to mysql and select db.
  if (!db_connect ())
  {
   echo "*** get_banner_link_details(). ".$GLOBALS['sql_database_connect_error'];
   return false;
  }

  $query = "select * from banner_links where id='$linkid'";
  $result = @mysql_query ($query);
  if (!$result)
  {
   echo "*** get_banner_link_details(). ".$GLOBALS['sql_get_banner_details_select_error']; 
   return false;
  }
 
  $result = @mysql_fetch_array ($result);

  return $result;
 }

 // this function tries to remove a file.
 function remove_file ($HTTP_GET_VARS)
 {
  // try to see if there is the variable.
  if (!isset ($HTTP_GET_VARS['file_path']))
   return false;

  // try to get the file path.
  $file_path = clean ($HTTP_GET_VARS['file_path']);

  // is there any empty item?
  if (!filled_out ($HTTP_GET_VARS) || $file_path == '')
   // do nothing.
   return false;

  // get the directory path.
  $directory_path = dirname ($file_path);

  // does the file exists?
  if (!@file_exists ($file_path))
  {
   echo '<br>'.$GLOBALS['there_is_no_file'].'<br>';
   return false;
  }
  else
  {
   // write permissions?
   if (!is_writable ($directory_path))
   {
    echo '<br>" <b><u>'.$directory_path.'</u></b> " : '.$GLOBALS['there_is_no_write_perm_dir'].'<br>';
    return false;
   }
   else
   {
    // try to remove the file.
    if (!@unlink ($file_path))
    {
     echo '<br>'.$GLOBALS['gui_file_delete_fail'].'<br>';
     return false;
    }
    else
     echo '<br>'.$GLOBALS['gui_file_delete_done'].'<br>';
    }
   }

  return true;
 }

 // this function shows a browsing list path
 // and if is needed gives delete operation.
 function show_browse_path ($browse_path = DIR_PARENT, $delete = false)
 {
  // this array will keep the list.
  $files_list = array ();

  // try to get a list of all files.
  $files_list = get_browse_path ($browse_path);

  echo '<br>';
  echo '<table cellpadding="15" cellspacing="0" border="0" summary="">';
  echo ' <tbody>';

  // for each file found.
  foreach ($files_list as $file_line)
  {
   echo '<tr>';
   echo ' <td align="center"><a href="'.$file_line.'" title="'. basename ($file_line) .'" target="_blank"><img border="1" style="padding: 10px" alt="'. basename ($file_line) .'" src="'.$file_line.'"></a></td>';

   // if true then print it.
   if ($delete)
    echo ' <td>[ <a onclick="return confirm ('."'".$GLOBALS['gui_deletion_yes_no']."'".');" href="'.$_SERVER['PHP_SELF'].'?file_path='.$file_line.'">X</a> ]</td>';

   echo ' <td>'.$file_line.'</td>';

   echo '</tr>';
  }

  echo ' </tbody>';
  echo '</table>';
  echo '<br>';

  return true;
 }

 // this function gets a browsing list path.
 function get_browse_path ($directory)
 {
  // this array will keep the list.
  $array_items = array ();

  // open the directory.
  if ($handle = opendir ($directory))
  {
   // start reading files.
   while (false !== ($file = readdir ($handle)))
   {
    // ignore current and parent directories.
    if ($file != "." && $file != "..")
    {
     // ignore the following directories.
     if ($file != "admin"          &&
         $file != "cj-linkout"     &&
         $file != "javascripts")
     {
      // is the current file a directory?
      if (is_dir ($directory.$file))
      {
       // go through the new directory.
       $array_items = array_merge ($array_items, get_browse_path ($directory.$file.'/'));
      }
      else
      {
       // check the filetype. if it is ok keep the file.
       foreach ($GLOBALS['conf_filetypes'] as $key => $value)
        if (strstr ($file, '.'.$key))
         $array_items[] = $directory.$file;
      }
     }
    }
   }

   // close the directory.
   closedir ($handle);
  }

  // return the list of files.
  return $array_items;
 }
?>
