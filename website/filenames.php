<?php

 // this file contains all the defines of filenames.

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

 // directories.

 // parent directory.
 define ('DIR_PARENT' , '../');

 // slash.
 define ('SLASH' , '/');

 // admin directories.
 define ('DIR_ADMIN'           ,              'admin/');
 define ('DIR_BANNER'          ,       'banner-links/');
 define ('DIR_CAT_CON'         ,   'category-content/');
 define ('DIR_GRAPHIC_TEXT'    , 'graphic-text-links/');
 define ('DIR_PAGE_COUNTERS'   ,      'page-counters/');
 define ('DIR_UPLOAD_GRAPHICS' ,    'upload-graphics/');
 define ('DIR_CORNER_ITEMS'    ,       'corner-items/');
 define ('DIR_ADJUST_INFO'     ,        'adjust-info/');
 define ('DIR_COMPS_STATUS'    ,  'components-status/');
 define ('DIR_EDIT_FILES'      ,         'edit-files/');
 define ('DIR_BROWSE_GRAPHICS' ,    'browse-graphics/');

 // templates directory.
 define ('DIR_TEMPLATES' , 'templates/');

 // admin and guest gui.
 define ('DIR_GUI_GUEST' , 'guest/');
 define ('DIR_GUI_ADMIN' , 'admin/');

 // css directory.
 define ('DIR_CSS' , 'stylesheets/');

 // flashes directory.
 define ('DIR_FLASHES' , 'flashes/');

 // components directory.
 define ('DIR_COMPONENTS' , 'components/');

 // classes directory.
 define ('DIR_CLASSES' , 'classes/');

 // libraries directory.
 define ('DIR_LIBS' , 'libraries/');

 // graphics directory.
 define ('DIR_GRAPHICS' , 'graphics/');

 // javascripts directory.
 define ('DIR_JS' , 'javascripts/');

 // link out component.
 define ('DIR_LINK_OUT', 'cj-linkout/');

 // poll support
 define ('DIR_POLLS', 'cj-dynamic-poll/');

 // graphic directories.
 define ('DIR_CONS'     , DIR_GRAPHICS.'contents/');
 define ('DIR_CATS'     , DIR_GRAPHICS.'categories/');
 define ('DIR_BANNERS'  , DIR_GRAPHICS.'banners/');
 define ('DIR_CORNERS'  , DIR_GRAPHICS.'corners/');
 define ('DIR_LINKS'    , DIR_GRAPHICS.'links/');
 define ('DIR_BASE'     , DIR_GRAPHICS.'base/');
 define ('DIR_BOX'      , DIR_GRAPHICS.'box/');

 // php files.

 // essential functions.
 define ('FILENAME_DATA_VALID_FNS'         , 'data-valid-fns.php');
 define ('FILENAME_DATETIME_FNS'           , 'date-time-fns.php');
 define ('FILENAME_GET_ADJUST_INFO'        , 'get-adjust-info.php');
 define ('FILENAME_GET_COMP_STATUS'        , 'get-comp-status.php');
 define ('FILENAME_DATABASE_FNS'           , 'db-fns.php');
 define ('FILENAME_UPLOAD_GRAPHICS_FNS'    , 'upload-graphics-fns.php');
 define ('FILENAME_REFRESH_TEMPLATE'       , 'refresh-template.php');
 define ('FILENAME_GET_TEMPLATE'           , 'get-template.php');
 define ('FILENAME_DISPLAY_SEARCH_RESULTS' , 'display-search-results.php');
 define ('FILENAME_DETECT_BROSWER'         , 'detect-browser.php');
 define ('FILENAME_GET_CORNER_ITEM'        , 'get-corner-item.php');
 define ('FILENAME_DISPLAY_CORNER_ITEM'    , 'display-corner-item.php');
 define ('FILENAME_GET_CATS_CONS_FNS'      , 'get-contents-categories-fns.php');
 define ('FILENAME_DISPLAY_CATS_CONS_FNS'  , 'display-contents-categories-fns.php');
 define ('FILENAME_SEND_EMAIL'             , 'send-email.php');
 define ('FILENAME_STRING_TO_IMAGE'        , 'string2image.php');
 define ('FILENAME_EDIT_FILE_CONTENTS'     , 'edit-file-contents.php');
 define ('FILENAME_OUTPUT_FNS'             , 'output-fns.php');
 define ('FILENAME_VS_CMS_FNS'             , 'vs-cms-fns.php');

 // website messages.
 define ('FILENAME_WEB_MESSAGES' , 'web-messages.php');

 // random messages.
 define ('FILENAME_RANDOM_MESSAGES' , 'random-messages.txt');

 // page and content counters, online users.
 define ('FILENAME_PAGE_COUNTER'    , 'page-counter.php');
 define ('FILENAME_CONTENT_COUNTER' , 'content-counter.php');
 define ('FILENAME_ONLINE_USERS'    , 'online-users.php');

 // user contact.
 define ('FILENAME_CONTACT_FORM' , 'contact-form.php');
 define ('FILENAME_CONTACT_SEND' , 'contact-send.php');

 // user holy sentence.
 define ('FILENAME_GET_HOLY_SENTENCE' , 'get-holy-sentence.php');

 // libraries.
 define ('FILENAME_XML_LIBRARY' , $conf_doc_root.SLASH.DIR_LIBS.'xml-library.php');

 // classes.
 define ('FILENAME_XML_CONF_SETS_CLASS' , $conf_doc_root.SLASH.DIR_CLASSES.'xml-conf-settings.class.php');

 // index file.
 define ('FILENAME_INDEX' , 'index.php');

 // user search.
 define ('FILENAME_SEARCH_FORM' , 'search-form.php');
 define ('FILENAME_SEARCH_SEND' , 'search-send.php');

 // user polls.
 define ('FILENAME_SHOW_USER_POLLS' , 'show-user-polls.php');

 // user random links.
 define ('FILENAME_SHOW_TEXT_LINKS' , 'show-text-links.php');
 define ('FILENAME_BANNER_LINKS'    , 'random-banner-links.php');
 define ('FILENAME_GRAPHIC_LINKS'   , 'random-graphic-links.php');
 define ('FILENAME_TEXT_LINKS'      , 'random-text-links.php');

 // user show category and content.
 define ('FILENAME_SHOW_CATEGORY'   , 'show-category.php');
 define ('FILENAME_SHOW_CONTENT'    , 'show-content.php');

 // text-size switching.
 define ('FILENAME_RESIZE_TEXT' , 'resize-text.php');

 // user random content.
 define ('FILENAME_RANDOM_CONTENT' , 'show-random-content.php');

 // welcome page.
 define ('FILENAME_WELCOME_PAGE' , 'welcome-page.php');

 // admin functions and menu operations.
 define ('FILENAME_ADMIN_FNS' , 'admin-fns.php');

 // admin banner links.
 define ('FILENAME_BANNERS_LIST'       , 'banners-list.php');
 define ('FILENAME_ADD_BANNER_FORM'    , 'add-banner-form.php');
 define ('FILENAME_ADD_BANNER'         , 'add-banner.php');
 define ('FILENAME_UPDATE_BANNER_FORM' , 'update-banner-form.php');
 define ('FILENAME_UPDATE_BANNER'      , 'update-banner.php');
 define ('FILENAME_REMOVE_ALL_BANNERS' , 'remove-all-banners.php');
 define ('FILENAME_REMOVE_BANNER'      , 'remove-banner.php');

 // admin categories and contents.
 define ('FILENAME_REMOVE_ALL_CATS'   , 'remove-all-categories.php');
 define ('FILENAME_REMOVE_ALL_CONS'   , 'remove-all-contents.php');
 define ('FILENAME_REMOVE_CAT'        , 'remove-category.php');
 define ('FILENAME_REMOVE_CON'        , 'remove-content.php');
 define ('FILENAME_ADD_CATEGORY'      , 'add-category.php');
 define ('FILENAME_UPDATE_CATEGORY'   , 'update-category.php');
 define ('FILENAME_ADD_CONTENT'       , 'add-content.php');
 define ('FILENAME_UPDATE_CONTENT'    , 'update-content.php');
 define ('FILENAME_ADD_CAT_CON'       , 'add-category-content.php');
 define ('FILENAME_UPDATE_CAT_CON'    , 'update-category-content.php');
 define ('FILENAME_ADD_CATEGORY_FORM' , 'add-category-form.php');
 define ('FILENAME_ADD_CONTENT_FORM'  , 'add-content-form.php');
 define ('FILENAME_UPDATE_CAT_FORM'   , 'update-category-form.php');
 define ('FILENAME_UPDATE_CON_FORM'   , 'update-content-form.php');

 // admin graphic and text links.
 define ('FILENAME_REMOVE_ALL_GRAPHICS' , 'remove-all-graphics.php');
 define ('FILENAME_REMOVE_ALL_TEXTS'    , 'remove-all-texts.php');
 define ('FILENAME_REMOVE_GRAPHIC'      , 'remove-graphic.php');
 define ('FILENAME_REMOVE_TEXT'         , 'remove-text.php');
 define ('FILENAME_ADD_GRAPHIC'         , 'add-graphic.php');
 define ('FILENAME_UPDATE_GRAPHIC'      , 'update-graphic.php');
 define ('FILENAME_ADD_TEXT'            , 'add-text.php');
 define ('FILENAME_UPDATE_TEXT'         , 'update-text.php');
 define ('FILENAME_ADD_GRAPHIC_TEXT'    , 'add-graphic-text.php');
 define ('FILENAME_UPDATE_GRAPHIC_TEXT' , 'update-graphic-text.php');
 define ('FILENAME_ADD_GRAPHIC_FORM'    , 'add-graphic-form.php');
 define ('FILENAME_ADD_TEXT_FORM'       , 'add-text-form.php');
 define ('FILENAME_UPDATE_GRAPHIC_FORM' , 'update-graphic-form.php');
 define ('FILENAME_UPDATE_TEXT_FORM'    , 'update-text-form.php');

 // admin page counters.
 define ('FILENAME_PAGE_COUNTERS_LIST'       , 'page-counters-list.php');
 define ('FILENAME_REMOVE_ALL_PAGE_COUNTERS' , 'remove-all-page-counters.php');
 define ('FILENAME_REMOVE_PAGE_COUNTER'      , 'remove-page-counter.php');
 define ('FILENAME_UPDATE_PAGE_COUNTER'      , 'update-page-counter.php');
 define ('FILENAME_UPDATE_PAGE_COUNTER_FORM' , 'update-page-counter-form.php');

 // admin corner items.
 define ('FILENAME_CORNER_ITEMS_LIST'       , 'corner-items-list.php');
 define ('FILENAME_UPDATE_CORNER_ITEM_FORM' , 'update-corner-item-form.php');
 define ('FILENAME_UPDATE_CORNER_ITEM'      , 'update-corner-item.php');

 // admin components status.
 define ('FILENAME_COMPS_STATUS_LIST'       , 'comps-status-list.php');
 define ('FILENAME_UPDATE_COMP_STATUS_FORM' , 'update-comp-status-form.php');
 define ('FILENAME_UPDATE_COMP_STATUS'      , 'update-comp-status.php');

 // admin upload graphics.
 define ('FILENAME_UPLOAD_GRAPHICS_FORM' , 'upload-graphics-form.php');
 define ('FILENAME_UPLOAD_GRAPHICS'      , 'upload-graphics.php');

 // admin crypt a password.
 define ('FILENAME_CRYPT_FORM'   , 'crypt-form.php');
 define ('FILENAME_CRYPT_RESULT' , 'crypt-result.php');

 // admin adjust info.
 define ('FILENAME_UPDATE_ADJUST_INFO_FORM' , 'update-adjust-info-form.php');
 define ('FILENAME_UPDATE_ADJUST_INFO'      , 'update-adjust-info.php');

 // admin browse graphics.
 define ('FILENAME_BROWSE_GRAPHICS' , 'browse-graphics.php');

 // admin edit files.
 define ('FILENAME_EDIT_FILE'       , 'edit-file.php');
 define ('FILENAME_EDIT_FILE_FORM'  , 'edit-file-form.php');
 define ('FILENAME_EDIT_FILES_LIST' , 'edit-files-list.php');

 // configuration files.
 define ('FILENAME_PHP_CONFIGURATION' , 'configuration.php');
 define ('FILENAME_XML_CONFIGURATION' , $conf_doc_root.SLASH.'configuration.xml');

 // css stylesheets.
 define ('CSS_INDEX'       , 'index-stylesheet.css');
 define ('CSS_MAIN'        , 'main-stylesheet.css');
 define ('CSS_MAIN_PRINT'  , 'main-print-stylesheet.css');
 define ('CSS_MAIN_MEDIUM' , 'text-size-medium.css');
 define ('CSS_MAIN_LARGE'  , 'text-size-large.css');
 define ('CSS_MAIN_SMALL'  , 'text-size-small.css');

 // favicon graphic.
 define ('FAVICON' , 'favicon.png');

 // rss news file.
 define ('RSS_FILE' , 'rss-news.xml');

 // audio player playlist.
 define ('PLAYLIST_FILE', 'audio-player-playlist.xml');
?>
