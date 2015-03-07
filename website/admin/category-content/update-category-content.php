<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<!--
 Copyright (c) 2006 Efstathios Chatzikyriakidis (contact@efxa.org)

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
  <!-- begin update category/content page -->
  <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
   <tbody>
    <tr>
     <td>
      <b><?= $gui_admin_update_cat_con_select_smt_list; ?></b>
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
          <a onclick="return confirm ('<?= $gui_deletion_yes_no; ?>');" href="<?= FILENAME_REMOVE_ALL_CATS; ?>"><?= $gui_admin_update_cat_con_remove_cats; ?></a>.
          <br><br><?= $gui_admin_update_cat_con_txt_con_list; ?><br><br>
          <?php
           // get categories out of database.
           $cat_array = get_categories ('admin');

           // display as links to cat pages.
           display_categories_admin ($cat_array, FILENAME_UPDATE_CAT_FORM);
          ?>
         </td>
         <td><?php d_s (40, 1); ?></td>
         <td>
          <a onclick="return confirm ('<?= $gui_deletion_yes_no; ?>');" href="<?= FILENAME_REMOVE_ALL_CONS; ?>"><?= $gui_admin_update_cat_con_remove_cons; ?></a>.
          <br><br><?= $gui_admin_update_cat_con_txt_cat_list; ?><br><br>
          <?php
           // get the contents for the appropriate category.
           $content_array = get_contents ();

           // display all contents for the appropriate category.
           display_contents_admin ($content_array, FILENAME_UPDATE_CON_FORM);
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
  <!-- end update category/content page -->
 </body>

</html>
