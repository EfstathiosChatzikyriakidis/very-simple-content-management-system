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
   // try to have linkid.
   $linkid = $HTTP_GET_VARS['linkid'];

   // is used for error checking.
   $linkid_error = false;

   // check to see if there is a linkid.
   if (!$linkid || $linkid == '')
    $linkid_error = true;
   else
   {
    // get this graphic out of database.
    $link = get_graphic_link_details ($linkid);
    $graphic_path = DIR_PARENT.DIR_PARENT.DIR_LINKS.clean_for_display ($link['graphic']);
   }
  ?>

  <!-- begin update graphic link form page -->

  <?php if ($linkid_error) { ?>

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

  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_update_graphic_link_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="update_graphic_form" action="<?= FILENAME_UPDATE_GRAPHIC; ?>">
       <fieldset>
        <legend><?= $gui_admin_update_graphic_link_form_legend; ?></legend>
        <table cellpadding="0" cellspacing="0" border="0" summary="">
         <tbody>
          <tr>
           <td><?= $gui_admin_update_graphic_link_form_name; ?></td>
           <td><?php input_text ('name', 'width: 233px', clean_for_display ($link['title'])); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_graphic_link_form_graphics; ?></td>
           <td><?php select_file (DIR_PARENT.DIR_PARENT.DIR_LINKS, clean_for_display ($link['graphic']), "graphic", 'width: 233px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_graphic_link_form_cur_image; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <?php
                 if ($link['graphic'] != 'no')
                 {
                ?>
                <a href="<?= $graphic_path; ?>" target="_blank" title="<?= $gui_real_size_graphic; ?>"><img alt="<?= $gui_real_size_graphic; ?>" src="<?= $graphic_path; ?>" border="0" hspace="0" vspace="10" width="100" height="125"></a>
                <?php
                 }
                 else
                  echo "<b><u>".$there_is_no_use_of_graphic."</u></b>";
                ?>
               </td>
              </tr>
             </tbody>
            </table>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_graphic_link_form_address; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td colspan="2">
                <?php input_text ('url', 'width: 233px', clean_for_display ($link['url'])); ?>
               </td>
              </tr>
              <tr>
               <td><?php d_s (6, 1); ?></td>
               <td><?= $gui_type_no_for_nth; ?></td>
              </tr>
             </tbody>
            </table>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 6); ?></td>
          </tr>
          <tr>
           <td><?php d_s (); ?></td>
           <td align="right">
            <?php
             input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
            ?>
           </td>
          </tr>
         </tbody>
        </table>
       </fieldset>
       <input type="hidden" name="submit_check" value="1">
       <input type="hidden" name="link_id" value="<?= $linkid ?>">
      </form>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>

  <?php } ?>

  <!-- end update graphic link form page -->
 </body>

</html>
