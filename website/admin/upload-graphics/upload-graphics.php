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
  <!-- begin upload graphics page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_upload_graphics_process; ?></b></td>
    </tr>
    <tr>
     <td>
      <?php
       // check to see if it is a bizzare access.
       if (array_key_exists ('upload_cat_submit', $_POST))
       {
        upload_graphics ($HTTP_POST_FILES, DIR_PARENT.DIR_PARENT.DIR_CATS);
       }
       else if (array_key_exists ('upload_con_submit', $_POST))
       {
        upload_graphics ($HTTP_POST_FILES, DIR_PARENT.DIR_PARENT.DIR_CONS);
       }
       else if (array_key_exists ('upload_banner_submit', $_POST))
       {
        upload_graphics ($HTTP_POST_FILES, DIR_PARENT.DIR_PARENT.DIR_BANNERS);
       }
       else if (array_key_exists ('upload_link_submit', $_POST))
       {
        upload_graphics ($HTTP_POST_FILES, DIR_PARENT.DIR_PARENT.DIR_LINKS);
       }
       else if (array_key_exists ('upload_corner_submit', $_POST))
       {
        upload_graphics ($HTTP_POST_FILES, DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_CORNERS);
       }
       else
       {
        echo "<br>".$gui_bizzare_access."<br>";
       }
      ?>
      <br><?= $gui_you_can_go_to; ?>&nbsp;<a href="<?= DIR_PARENT.FILENAME_INDEX; ?>" target="_top"><b><?= $gui_go_to_index_page; ?></b></a> , <a href="javascript: history.go(-1);"><b><?= $gui_go_back_txt; ?></b></a>.
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>
  <!-- end upload graphics page -->
 </body>

</html>
