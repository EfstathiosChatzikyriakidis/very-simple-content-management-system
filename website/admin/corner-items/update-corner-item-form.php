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
   // try to have itemid.
   $itemid = $HTTP_GET_VARS['itemid'];

   // is used for error checking.
   $itemid_error = false;

   // check to see if there is a itemid.
   if (!$itemid || $itemid == '')
    $itemid_error = true;
   else
   {
    // get this corner item out of database.
    $item = get_corner_item_details ($itemid);
    $graphic_path = DIR_PARENT.DIR_PARENT.TEMPLATE.DIR_CORNERS.clean_for_display ($item['graphic']);
   }
  ?>

  <!-- begin update corner item form page -->

  <?php if ($itemid_error) { ?>

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
     <td><b><?= $gui_admin_corners_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="update_corner_item_form" action="<?= FILENAME_UPDATE_CORNER_ITEM; ?>">
       <fieldset>
        <legend><?= $gui_admin_corners_form_legend; ?></legend>
        <table cellpadding="0" cellspacing="0" border="0" summary="">
         <tbody>
          <tr>
           <td><?= $gui_admin_corners_form_description; ?></td>
           <td><?php input_text ('title', 'width: 233px', clean_for_display ($item['title'])); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_corners_form_graphics; ?></td>
           <td><?php select_file (DIR_PARENT.DIR_PARENT.TEMPLATE.DIR_CORNERS, $item['graphic'], "graphic", 'width: 233px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_corners_form_cur_image; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <a href="<?= $graphic_path; ?>" title="<?= $gui_real_size_graphic; ?>" target="_blank"><img src="<?= $graphic_path; ?>" alt="<?= $gui_real_size_graphic; ?>" hspace="0" vspace="10" width="81" height="41" border="0"></a>
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
           <td><?= $gui_admin_corners_form_address; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td colspan="2">
                <?php input_text ('url', 'width: 233px', clean_for_display ($item['url'])); ?>
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
       <input type="hidden" name="item_id" value="<?= $itemid ?>">
      </form>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>

  <?php } ?>

  <!-- end update corner item form page -->
 </body>

</html>
