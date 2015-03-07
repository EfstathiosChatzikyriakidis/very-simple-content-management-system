<?php
 // require all functions.
 require_once ("vs-cms-fns.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<!--
 Copyright (c) 2007 Efstathios Chatzikyriakidis (contact@efxa.org)

 Permission is granted to copy, distribute and/or modify this document
 under the terms of the GNU Free Documentation License, Version 1.2 or
 any later version published by the Free Software Foundation; with no
 Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
 copy of the license is included in the section entitled "GNU Free
 Documentation License".
-->

<html>

 <head>
  <title><?= $gui_welcome_title." > ".$gui_show_user_polls."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin user polls page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_user_polls_header; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 5); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
       <tbody>
        <tr>
         <td><?php d_s (10, 1); ?></td>
         <td>
          <table cellspacing="0" cellpadding="0" border="0" summary="">
           <tbody>
            <tr>
             <td><?php d_s (1, 5); ?></td>
            </tr>
            <tr>
             <td>
              <?php
               // include user polls.
               include (DIR_COMPONENTS.DIR_POLLS."poll.php");
              ?>
             </td>
            </tr>
           </tbody>
          </table>
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
  <!-- end user polls page -->
 </body>

</html>
