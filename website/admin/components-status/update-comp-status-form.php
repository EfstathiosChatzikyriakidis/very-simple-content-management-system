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
    // get this component out of database.
    $item = get_comp_details ($itemid);
   }
  ?>

  <!-- begin update component status form page -->

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
     <td><b><?= $gui_admin_components_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="update_comp_status_form" action="<?= FILENAME_UPDATE_COMP_STATUS; ?>">
       <fieldset>
        <legend><?= $gui_admin_components_form_legend; ?></legend>
        <table cellpadding="0" cellspacing="0" border="0" summary="">
         <tbody>
          <tr>
           <td><?= $gui_admin_components_form_name; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (16, 1); ?></td>
               <td><b><?= clean_for_display ($item['comp_name']); ?></b></td>
              </tr>
             </tbody>
            </table>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_components_form_state; ?></td>
           <td>
            <?php select_boolean ("comp_status", $item['comp_status'], 'width: 60px'); ?>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 8); ?></td>
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

  <!-- end update component status form page -->
 </body>

</html>
