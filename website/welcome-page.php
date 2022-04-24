<?php
 // require all global functions.
 require_once ("vs-cms-fns.php");

 // require for printing graphic links.
 require (FILENAME_GRAPHIC_LINKS);
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
  <title><?= $gui_welcome_title." > ".$gui_homepage_title."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin welcome page -->
  <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
   <tbody>
    <?php
     if (get_comp_status ('graphic_links'))
     {
    ?>
    <tr>
     <td><?php d_s (1, 10); ?></td>
    </tr>
    <tr>
     <td align="center">
     <?php
      // try to print random graphic links.
      random_graphic_links ($conf_adjust_info['graphic_links_number'], $conf_adjust_info['graphic_links_cols']);
     ?>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <?php
     }
    ?>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
       <tbody>
        <tr>
         <td><?php d_s (10, 1); ?></td>
         <td style="text-align: justify">
         <?php
           // echo welcome message.
           echo pretty_for_display ($conf_adjust_info['main_column_welcome']);
         ?>
         </td>
         <td><?php d_s (20, 1); ?></td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <!--
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    -->
   </tbody>
  </table>
  <!-- end welcome page -->
 </body>

</html>
