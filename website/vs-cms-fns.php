<?php

 // we can include this file in all our files. this
 // way, every file will contain all our functions.

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

 // that is for debugging mode. you
 // can enable/disable at any time.
 error_reporting (E_ALL);

 // configuration php variables.
 require_once ("configuration.php");

 // internal filename defines.
 require_once ("filenames.php");

 // we need this class in order to read xml configuration.
 require_once (FILENAME_XML_CONF_SETS_CLASS);

   // load configuration settings (xml).
   $conf_xml_sets = new conf_settings_xml;
   $conf_xml_sets->load (FILENAME_XML_CONFIGURATION);

   // define the name, version and development starting date.
   define ('PROJECT_INFO' , $conf_xml_sets->get ("project.name.text")      . " "   .
                            $conf_xml_sets->get ("project.name.cms")       . " , " .
                            $conf_xml_sets->get ("project.version.text")   . " "   .
                            $conf_xml_sets->get ("project.version.number") . " , " .
                            $conf_xml_sets->get ("project.date_info.text") . " "   .
                            $conf_xml_sets->get ("project.date_info.date") . ".");

 // important includes.
 require_once (FILENAME_DATABASE_FNS);
 require_once (FILENAME_WEB_MESSAGES);
 require_once (FILENAME_DETECT_BROSWER);

   // get the broswer name.
   $conf_broswer_name = browser_detection ('browser');

   // check the broswer.
   check_broswer ($conf_xml_sets->get ("disallow.broswer"));

 require_once (FILENAME_DATA_VALID_FNS);
 require_once (FILENAME_REFRESH_TEMPLATE);
 require_once (FILENAME_GET_TEMPLATE);

   // if the client's ip address is unknown install a basic template.
   // otherwise, try to change the template in case of a GET request.
   refresh_template ($_GET);

   // get template.
   $conf_temp_style = clean_for_display (get_template ());
   if (!$conf_temp_style)
    die ("*** ".FILENAME_VS_CMS_FNS." [1].");

   // the guest template.
   define ('TEMPLATE' , DIR_TEMPLATES.DIR_GUI_GUEST.$conf_temp_style.SLASH);

   // the admin template.
   $conf_admin_style = $GLOBALS['conf_xml_sets']->get ("template.theme.admin");
   define ('TEMPLATE_ADMIN' , DIR_TEMPLATES.DIR_GUI_ADMIN.$conf_admin_style.SLASH);

 require_once (FILENAME_GET_ADJUST_INFO);

   // get adjustment info.
   $conf_adjust_info = get_adjust_info ();
   if (!$conf_adjust_info)
    die ("*** ".FILENAME_VS_CMS_FNS." [2].");

   // init the size mode of the text to medium.
   if (!isset ($_SESSION['text_size']))
    $_SESSION['text_size'] = $conf_xml_sets->get ("accessibility.text.size");

   // get the size mode of the text.
   $conf_text_size_mode = $_SESSION['text_size'];

 require_once (FILENAME_GET_CATS_CONS_FNS);
 require_once (FILENAME_DISPLAY_CATS_CONS_FNS);
 require_once (FILENAME_GET_CORNER_ITEM);
 require_once (FILENAME_UPLOAD_GRAPHICS_FNS);
 require_once (FILENAME_GET_COMP_STATUS);
 require_once (FILENAME_EDIT_FILE_CONTENTS);
 require_once (FILENAME_DISPLAY_CORNER_ITEM);
 require_once (FILENAME_DISPLAY_SEARCH_RESULTS);
 require_once (FILENAME_OUTPUT_FNS);
 require_once (FILENAME_GET_HOLY_SENTENCE);
 require_once (FILENAME_PAGE_COUNTER);
 require_once (FILENAME_CONTENT_COUNTER);
 require_once (FILENAME_DATETIME_FNS);
 require_once (FILENAME_ONLINE_USERS);
 require_once (FILENAME_SEND_EMAIL);

?>
