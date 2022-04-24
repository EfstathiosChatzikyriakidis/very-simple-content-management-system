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
  <title><?= $gui_welcome_title." > ".$gui_contact_form_title."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin contact form page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_contact_form_header; ?></b></td>
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
          <br>
          <table cellspacing="0" cellpadding="0" border="0" summary="">
           <tbody>
            <tr>
             <td>
              <form method="post" name="contact_form" action="<?= FILENAME_CONTACT_SEND; ?>">
               <fieldset>
                <legend><?= $gui_contact_form_legend; ?></legend>
                <table cellpadding="0" cellspacing="0" border="0" summary="">
                 <tbody>
                  <tr>
                   <td><?= $gui_contact_form_name; ?></td>
                   <td><?php input_text ('name', 'width: 270px', ''); ?></td>
                  </tr>
                  <tr>
                   <td colspan="2"><?php d_s (1, 4); ?></td>
                  </tr>
                  <tr>
                   <td><?= $gui_contact_form_email; ?></td>
                   <td><?php input_text ('email', 'width: 270px', ''); ?></td>
                  </tr>
                  <tr>
                   <td colspan="2"><?php d_s (1, 3); ?></td>
                  </tr>
                  <tr>
                   <td><?= $gui_contact_form_message; ?></td>
                   <td><?php input_textarea ('message', 'width: 270px; height: 90px', ''); ?></td>
                  </tr>
                  <tr>
                   <td colspan="2"><?php d_s (1, 6); ?></td>
                  </tr>
                  <tr>
                   <td><?php d_s (); ?></td>
                   <td align="center">
                    <?php
                     input_button ('image', 'submit', TEMPLATE.DIR_GRAPHICS."submit.png");
                     echo d_s (10, 1);
                     echo '<a href="'.FILENAME_CONTACT_FORM.'"><img src="'.TEMPLATE.DIR_GRAPHICS.'clear.png" border="0" alt=""></a>';
                    ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
               </fieldset>
               <input type="hidden" name="submit_check" value="1">
              </form>
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
  <!-- end contact form page -->
 </body>

</html>
