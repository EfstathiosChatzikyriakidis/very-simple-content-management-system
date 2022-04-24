<?php

 // vs-cms configuration php variables.

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

  // mysql connect account information.
  $conf_mysql_host = "";
  $conf_mysql_user = "";
  $conf_mysql_pass = "";
  $conf_mysql_db   = "";

  // acceptable file types.
  // if array is blank then all
  // file types will be accepted.
  $conf_filetypes = array
  (
   'jpg'  => 'image/jpeg'  ,
   'jpe'  => 'image/jpeg'  ,
   'jpeg' => 'image/jpeg'  ,
   'png'  => 'image/x-png' ,
   'png'  => 'image/png'
  );

  // get http host address.
  $conf_http_host = $_SERVER['HTTP_HOST'];

  // the following might be nice for future use.

  // parse the url.
  $link_array = parse_url ("http://".$conf_http_host);

  // eg: <protocol>://<host>/<script_name>?<queries>
  // $link_array['scheme'] = <protocol>
  // $link_array['host']   = <host>
  // $link_array['path']   = <script_name>
  // $link_array['query']  = <queries>

  $host = $link_array['host'];
  $dot_pos = strpos ($host, '.', 0) + 1;

  // get the domain name.
  $conf_domain_name = substr ($host, $dot_pos);

  // get remote address (ip).
  $conf_remote_address = $_SERVER['REMOTE_ADDR'];

  // get url script name.
  $conf_script_name = $_SERVER['SCRIPT_NAME'];

  // get any query variables.
  $conf_query_string = $_SERVER['QUERY_STRING'];

  // get both script name and query string.
  $conf_script_query = $conf_script_name.$conf_query_string;

  // get the document root.
  if (isset($_SERVER['DOCUMENT_ROOT']))
  { 
   // if the `DOCUMENT_ROOT' variable exists.
   $conf_doc_root = $_SERVER['DOCUMENT_ROOT'];
  }
  else
  {
   // if does not, define it (use it for win32).
   // $conf_doc_root = "<path>";
  }

  // get a random number between 0 and 1.
  $conf_random_number = rand (0, 1);

  // define line max characters.
  define ('MAX_LINE' , 1024 * 1024); // 1Mbyte fixed.

  // define max content title length.
  define ('CONTENT_TITLE_MAX_LEN', 75);

  // online user timeout limit. 900 means 15 minutes.
  define ('TIMEOUT_LIMIT_ONLINE_USERS', 900);

  // uploaded file permissions.
  define ('UPLOADED_FILE_PERMISSIONS', 0644);
  
  // define uploaded file max size.
  define ('FILE_MAX_SIZE', 1024); // 1KB fixed.
  
  // define prefix of css filenames for zoom-text-size.
  define ('PREFIX_CSS_FILENAME_TEXT_SIZE' , 'text-size-');
?>
