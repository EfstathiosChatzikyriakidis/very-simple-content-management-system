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
  <!-- begin add category form page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_add_cat_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="add_category_form" action="<?= FILENAME_ADD_CATEGORY; ?>">
       <fieldset>
        <legend><?= $gui_admin_add_cat_form_legend; ?></legend>
        <table cellpadding="0" cellspacing="0" border="0" summary="">
         <tbody>
          <tr>
           <td><?= $gui_admin_add_cat_form_name; ?></td>
           <td><?php input_text ('cat_name', 'width: 233px', ''); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_add_cat_form_level; ?></td>
           <td>
            <select name="cat_pid" style="width: 233px">
            <option value=""><?= $gui_select_txt; ?></option>
            <option value="0"><?= $gui_root_txt; ?></option>
            <?php
             $options = '';

             $get_options = get_cat_selectlist (0, 0);   
             if (count ($get_options) > 0)
              foreach ($get_options as $key => $value)
               $options .= '<option value="'.$key.'">'.stripslashes ($value).'</option>';

             echo $options;
            ?>
            </select>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_add_cat_form_graphics; ?></td>
           <td><?php select_file (DIR_PARENT.DIR_PARENT.DIR_CATS, '', "cat_graphic", 'width: 233px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_add_cat_form_description; ?></td>
           <td><?php input_text ('cat_description', 'width: 233px', ''); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 8); ?></td>
          </tr>
          <tr>
           <td><?php d_s (); ?></td>
           <td align="center">
            <?php
             input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
             echo d_s (10, 1);
             echo '<a href="'.FILENAME_ADD_CATEGORY_FORM.'"><img src="'.DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."clear.png".'" border="0" alt=""></a>';
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
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>
  <!-- end add category form page -->
 </body>

</html>
