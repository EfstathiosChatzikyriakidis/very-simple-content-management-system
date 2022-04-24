<?php
 // require all functions.
 require_once ("vs-cms-fns.php");

 // require for printing text links.
 require (FILENAME_TEXT_LINKS);
?>

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

<html>

 <head>
  <title><?= $gui_welcome_title." > ".$gui_text_links_title."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin show text links page -->
  <table cellspacing="0" cellpadding="0" width="100%" border="0" class="height_hundred_persent" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_text_links_header; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 10); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" class="height_hundred_persent" width="100%" summary="">
       <tbody>
        <tr>
         <td><?php d_s (10, 1); ?></td>
         <td align="center">
          <?php
           // try to print random text links.
           random_text_links ($conf_adjust_info['text_links_number']);
          ?>
         </td>
         <td><?php d_s (10, 1); ?></td>
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
  <!-- end show text links page -->
 </body>

</html>
