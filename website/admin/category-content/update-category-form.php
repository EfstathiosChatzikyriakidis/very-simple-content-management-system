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
   // try to have catid.
   $catid = $HTTP_GET_VARS['catid'];

   // is used for error checking.
   $catid_error = false;

   // check to see if there is a catid.
   if (!$catid || $catid == '')
    $catid_error = true;
   else
   {
    // get this category out of database.
    $category = get_category_details ($catid);
    $graphic_path = DIR_PARENT.DIR_PARENT.DIR_CATS.clean_for_display ($category['cat_graphic']);
   }
  ?>

  <!-- begin update category form page -->

  <?php if ($catid_error) { ?>

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
     <td><b><?= $gui_admin_update_cat_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="update_category_form" action="<?= FILENAME_UPDATE_CATEGORY; ?>">
       <fieldset>
        <legend><?= $gui_admin_update_cat_form_legend; ?></legend>
        <table cellpadding="0" cellspacing="0" border="0" summary="">
         <tbody>
          <tr>
           <td><?= $gui_admin_update_cat_form_name; ?></td>
           <td><?php input_text ('cat_name', 'width: 233px', clean_for_display ($category['cat_name'])); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_cat_form_level; ?></td>
           <td>
            <select name="cat_pid" style="width: 233px">
            <option value=""><?= $gui_select_txt; ?></option>
            <option value="0"><?= $gui_root_txt; ?></option>
            <?php
             $options = '';

             $get_options = get_cat_selectlist (0, 0);   
             if (count ($get_options) > 0)
              foreach ($get_options as $key => $value)
              {
               $options .= '<option value="'.$key.'"';

               // show the selected items as selected in the listbox
               if ($category['cat_id'] == "$key")
                $options .= ' selected="selected"';

               $options .= '>'.stripslashes ($value).'</option>';
              }

             echo $options;
            ?>
            </select>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_cat_form_graphics; ?></td>
           <td><?php select_file (DIR_PARENT.DIR_PARENT.DIR_CATS, clean_for_display ($category['cat_graphic']), "cat_graphic", 'width: 233px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_cat_form_visibility; ?></td>
           <td><?php select_boolean ('cat_visibility', $category['cat_visibility'], 'width: 60px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_cat_form_cur_image; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <?php
                 if ($category['cat_graphic'] != 'no')
                 {
                ?>
                <a href="<?= $graphic_path; ?>" target="_blank" title="<?= $gui_real_size_graphic; ?>"><img alt="<?= $gui_real_size_graphic; ?>" src="<?= $graphic_path; ?>" border="0" hspace="0" vspace="10" width="30" height="40"></a>
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
           <td colspan="2"><?php d_s (1, 3); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_cat_form_description; ?></td>
           <td><?php input_text ('cat_description', 'width: 233px', clean_for_display ($category['cat_description'])); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 7); ?></td>
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
       <input type="hidden" name="cat_id" value="<?= $catid ?>">
      </form>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>

  <?php } ?>

  <!-- end update category form page -->
 </body>

</html>
