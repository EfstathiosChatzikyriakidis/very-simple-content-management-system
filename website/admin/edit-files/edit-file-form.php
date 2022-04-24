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
  <?php
   // try to have the input file.
   $file_path = $HTTP_GET_VARS['file_path'];

   // is used for error checking.
   $file_path_error = false;

   // check to see if there is an input file.
   if (!$file_path || $file_path == '')
    $file_path_error = true;
  ?>

  <?php if ($file_path_error) { ?>

  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td colspan="2"><?php d_s (1, 10); ?></td>
    </tr>
    <tr>
     <td><?php d_s (10, 1); ?></td>
     <td>
      <?php
       echo $gui_bizzare_access;
       echo '<br><br>';
       echo $gui_you_can_go_to.'&nbsp;<a href="'.DIR_PARENT.FILENAME_INDEX.'"><b>'.$gui_go_to_index_page.'</b></a>.';
      ?>
     </td>
    </tr>
   </tbody>
  </table>

  <?php } else { ?>

  <!-- begin edit files form page -->
  <table cellspacing="0" cellpadding="0" border="0" class="hundred_persent" summary="">
   <tbody>
    <tr>
     <td height="1"><b><?= $gui_admin_edit_files_form_title; ?></b></td>
    </tr>
    <tr>
     <td height="1"><?php d_s (1, 10); ?></td>
    </tr>
    <tr>
     <td height="1">
      <?php
       // check if the file exists.
       if (!file_exists ($file_path))
        echo $gui_admin_update_file_contents_doesnt_exist;
       else
       {
        // check if the file is readable.
        if (!is_readable ($file_path))
         echo $gui_admin_update_file_contents_r_failed;
        else
        {
         $contents = '';
        
         // try to open the file.
         $fp = fopen ($file_path , "r");

         while (!feof ($fp))
          $contents .= fread ($fp , 1024);

         fclose ($fp);
        }
       }
      ?>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 10); ?></td>
    </tr>
    <tr>
     <td valign="top" align="center">
      <form method="post" name="update_edit_file_form" action="<?= FILENAME_EDIT_FILE; ?>">
       <?php
        input_textarea ('file_contents', 'width: 90%; height: 430px; margin-right: 15px', htmlspecialchars ($contents));
       ?>
       <input type="hidden" name="submit_check" value="1">
       <input type="hidden" name="file_path" value="<?= $file_path; ?>">
       <br><br>
       <?php
        input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
       ?>
      </form>
     </td>
    </tr>
   </tbody>
  </table>

  <?php } ?>

  <!-- end edit files form page -->
 </body>

</html>
