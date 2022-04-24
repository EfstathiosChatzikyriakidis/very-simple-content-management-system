<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<!--
 Copyright (c) 2006 Efstathios Chatzikyriakidis (stathis.chatzikyriakidis@gmail.com)

 Permission is granted to copy, distribute and/or modify this document
 under the terms of the GNU Free Documentation License, Version 1.2 or
 any later version published by the Free Software Foundation; with no
 Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
 copy of the license is included in the section entitled "GNU Free
 Documentation License".
-->

<?php
 // require all global functions.
 require_once ("vs-cms-fns.php");
?>

<html>

 <head>
  <title><?= $gui_welcome_title; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin page counters page -->
  <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
   <tbody>
    <tr>
     <td>
      <b><?= $gui_admin_page_counters_select_list; ?></b>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" summary="">
       <tbody>
        <tr valign="top">
         <td>
          <a onclick="return confirm ('<?= $gui_deletion_yes_no; ?>');" href="<?= FILENAME_REMOVE_ALL_PAGE_COUNTERS; ?>"><?= $gui_admin_page_counters_remove_all; ?></a>.
          <br><br><?= $gui_admin_page_counters_txt_list; ?> <br><br>
          <?php
           // get page counters out of database.
           $page_counters_array = get_page_counters ();

           // display as links.
           display_page_counters ($page_counters_array, FILENAME_UPDATE_PAGE_COUNTER_FORM);
          ?>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>
  <!-- end page counter page -->
 </body>

</html>
