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
  <!-- begin add category/content page -->
  <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_add_cat_con_select_smt_list; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_ADD_CATEGORY_FORM; ?>"><?= $gui_admin_add_cat_con_select_cat_list; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_ADD_CONTENT_FORM; ?>"><?= $gui_admin_add_cat_con_select_con_list; ?></a>.
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>
  <!-- end add category/content page -->
 </body>

</html>
