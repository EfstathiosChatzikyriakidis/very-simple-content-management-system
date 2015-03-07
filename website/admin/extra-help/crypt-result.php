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

 // try to get the password.
 $pass = clean ($HTTP_POST_VARS['pass']);

 // try to crypt the password.
 $pass_crypt = crypt ($pass , "DG");
?>

<html>

 <head>
  <title><?= $gui_admin_crypt_form_title; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin crypt result page -->
  <table cellspacing="10" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td>
      <?php
       // check to see if it is a bizzare access.
       if (!array_key_exists ('submit_check', $_POST))
        echo $gui_bizzare_access;
       else
       {
        if (!filled_out ($HTTP_POST_VARS) || $pass == '')
         echo $gui_fill_all_fields.'&nbsp;'.$gui_try_again;
        else
        {
         echo '<h2>'.$pass.' : <u>'.$pass_crypt.'</u></h2>';
        }
       } 
      ?>
     </td>
    </tr>
    <tr>
     <td>
      <?= $gui_you_can_go_to; ?>&nbsp;<a href="<?= FILENAME_CRYPT_FORM; ?>"><b><?= $gui_go_back_txt; ?></b></a>.
     </td>
    </tr>
   </tbody>
  </table>
  <!-- end crypt result page -->
 </body>

</html>
