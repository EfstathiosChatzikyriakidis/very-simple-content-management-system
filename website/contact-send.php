<?php
 // require all functions.
 require_once ("vs-cms-fns.php");
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
  <title><?= $gui_welcome_title." > ".$gui_contact_form_title." > ".$gui_contact_send_title."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin contact send page -->
  <table cellspacing="0" cellpadding="0" class="bg_graphic" border="0" width="100%" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_contact_send_header; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
       <tbody>
        <tr>
         <td><?php d_s (10, 1); ?></td>
         <td>
          <?php
           // check to see if it is a bizzare access.
           if (array_key_exists ('submit_check', $_POST))
            {
             // process the data and send the message.
             // also inform the client about the result.
             if (send_email ($_POST))
              echo $gui_contact_send_good;
             else
              echo $gui_contact_send_bad;
            }
           else
            {
             echo $gui_bizzare_access;
            }
          ?>
          <br><br><?= $gui_you_can_go_to; ?>&nbsp;<a href="<?= FILENAME_WELCOME_PAGE; ?>"><b><?= $gui_go_to_index_page; ?></b></a> , <a href="<?= FILENAME_CONTACT_FORM; ?>"><b><?= $gui_go_back_txt; ?></b></a>.
         </td>
         <td><?php d_s (10, 1); ?></td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td height="100%"><?php d_s (); ?></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>
  <!-- end contact send page -->
 </body>

</html>
