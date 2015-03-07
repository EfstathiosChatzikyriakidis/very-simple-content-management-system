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
  <script language="javascript" type="text/javascript" src="<?= DIR_PARENT.DIR_PARENT.DIR_JS."tiny-mce/tiny_mce.js"; ?>"></script>
  <script language="javascript" type="text/javascript">
   tinyMCE.init({
    mode    : "textareas",
    theme   : "advanced",
    plugins : "nonbreaking,inlinepopups,table,layer,advimage,advhr,advlink,emotions,insertdatetime,preview,flash,searchreplace,contextmenu",

    theme_advanced_buttons1_add : "fontselect,advhr,flash",
    theme_advanced_buttons2_add : "separator,preview,separator,forecolor,insertdate,inserttime,nonbreaking,emotions",

    theme_advanced_buttons2_add_before : "search,separator,replace,separator",
    theme_advanced_buttons3_add_before : "insertlayer,separator,moveforward,movebackward,separator,absolute,tablecontrols,separator",

    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align    : "left",
    theme_advanced_path_location    : "bottom",
    plugin_insertdate_dateFormat    : "%Y-%m-%d",
    plugin_insertdate_timeFormat    : "%H:%M:%S",
    entity_encoding                 : "raw",
   	nonbreaking_force_tab           : true,

    extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
    external_link_list_url  : "example_data/example_link_list.js",
    external_image_list_url : "example_data/example_image_list.js",
    flash_external_list_url : "example_data/example_flash_list.js"
   });
  </script>
 </head>

 <body>
  <?php
   // try to have conid.
   $conid = $HTTP_GET_VARS['conid'];

   // is used for error checking.
   $conid_error = false;

   // check to see if there is a conid.
   if (!$conid || $conid == '')
    $conid_error = true;
   else
   {
    // get this content out of database.
    $content = get_content_details ($conid);
    $graphic_path = DIR_PARENT.DIR_PARENT.DIR_CONS.clean_for_display ($content['con_graphic']);
   }
  ?>

  <!-- begin update content form page -->

  <?php if ($conid_error) { ?>

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
     <td><b><?= $gui_admin_update_con_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="update_content_form" action="<?= FILENAME_UPDATE_CONTENT; ?>">
       <fieldset>
        <legend><?= $gui_admin_update_con_form_legend; ?></legend>
        <table cellpadding="0" cellspacing="0" border="0" summary="">
         <tbody>
          <tr>
           <td><?= $gui_admin_update_con_form_category; ?></td>
           <td>
            <select name="cat_id" style="width: 260px">
            <option value=""><?= $gui_select_txt; ?></option>
            <?php
             $options = '';

             $get_options = get_cat_selectlist (0, 0);   
             if (count ($get_options) > 0)
              foreach ($get_options as $key => $value)
              {
               $options .= '<option value="'.$key.'"';

               // show the selected items as selected in the listbox
               if ($content['cat_id'] == "$key")
                $options .= ' selected="selected"';

               $options .= '>'.stripslashes ($value).'</option>';
              }

             echo $options;
            ?>
            </select>
           </td>
          </tr>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_con_form_graphics; ?></td>
           <td><?php select_file (DIR_PARENT.DIR_PARENT.DIR_CONS, $content['con_graphic'], "con_graphic", 'width: 260px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_con_form_visibility; ?></td>
           <td><?php select_boolean ('con_visibility', $content['con_visibility'], 'width: 60px'); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 4); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_con_form_cur_image; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <?php
                 if ($content['con_graphic'] != 'no')
                 {
                ?>
                <a href="<?= $graphic_path; ?>" target="_blank" title="<?= $gui_real_size_graphic; ?>"><img alt="<?= $gui_real_size_graphic; ?>" src="<?= $graphic_path; ?>" border="0" hspace="0" vspace="10" width="120" height="150"></a>
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
           <td><?= $gui_admin_update_con_form_name; ?></td>
           <td><?php input_text ('con_base_title', 'width: 260px', clean_for_display ($content['con_base_title'])); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 3); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_con_form_description; ?></td>
           <td><?php input_text ('con_des_title', 'width: 260px', clean_for_display ($content['con_des_title'])); ?></td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 3); ?></td>
          </tr>
          <tr>
           <td><?= $gui_admin_update_con_form_hits; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <?php
                 echo ' <b><u>'.$content["con_hits"].'</u></b>';

                 if ($content["con_hits"] == 1)
                  echo " ".$gui_counter_one_time;
                 else if ($content["con_hits"] > 1)
                  echo " ".$gui_counter_many_times;

                 echo ".";
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
           <td><?= '- '.$gui_admin_update_con_form_datetime; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <?php
                 echo $content['con_date'].' , '.$content['con_time'].".";
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
           <td><?= '- '.$gui_admin_update_con_form_change_datetime; ?></td>
           <td>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?php d_s (15, 1); ?></td>
               <td>
                <?php
                 echo $content['con_change_date'].' , '.$content['con_change_time'].".";
                ?>
               </td>
              </tr>
             </tbody>
            </table>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 2); ?></td>
          </tr>
          <tr>
           <td colspan="2">
            <?= $gui_admin_update_con_form_text; ?>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 10); ?></td>
          </tr>
          <tr>
           <td colspan="2">
            <?php input_textarea ('con_text', 'width: 100%; height: 400px', stripslashes ($content['con_text'])); ?>
           </td>
          </tr>
          <tr>
           <td colspan="2"><?php d_s (1, 6); ?></td>
          </tr>
          <tr>
           <td colspan="2" align="right">
            <?php
             input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
            ?>
           </td>
          </tr>
         </tbody>
        </table>
       </fieldset>
       <input type="hidden" name="submit_check" value="1">
       <input type="hidden" name="con_id" value="<?= $conid ?>">
      </form>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>

  <?php } ?>

  <!-- end update content form page -->
 </body>

</html>
