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
   // try to have infoid.
   $infoid = $HTTP_GET_VARS['infoid'];

   // is used for error checking.
   $infoid_error = false;

   // check to see if there is a infoid.
   if (!$infoid || $infoid == '')
    $infoid_error = true;
  ?>

  <!-- begin update adjust info form page -->

  <?php if ($infoid_error) { ?>

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

  <!-- begin update adjust info form page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_adjust_form_title; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 10); ?></td>
    </tr>
    <tr>
     <td>
      <form method="post" name="update_adjust_info_form" action="<?= FILENAME_UPDATE_ADJUST_INFO; ?>">
       <?= d_s (1, 5). '<br>'; ?>
       <table cellspacing="0" cellpadding="0" border="0" summary="0">
        <tbody>
         <tr>
          <td>
           <fieldset>
            <legend><?= $gui_admin_adjust_form_links_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="0">
             <tbody>
              <tr>
               <td><?= $gui_admin_adjust_form_links_text_num; ?></td>
               <td><?php input_text ('text_links_number', 'width: 50px', $conf_adjust_info['text_links_number']); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 12); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_links_graphic_num; ?></td>
               <td><?php input_text ('graphic_links_number', 'width: 50px', $conf_adjust_info['graphic_links_number']); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_links_graphic_col; ?></td>
               <td><?php input_text ('graphic_links_cols', 'width: 50px', $conf_adjust_info['graphic_links_cols']); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 12); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_links_banner_num; ?></td>
               <td><?php input_text ('banner_links_number', 'width: 50px', $conf_adjust_info['banner_links_number']); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_links_banner_col; ?></td>
               <td><?php input_text ('banner_links_cols', 'width: 50px', $conf_adjust_info['banner_links_cols']); ?></td>
              </tr>
             </tbody>
            </table>
           </fieldset>
          </td>
         </tr>
        </tbody>
       </table>
       <br>
       <table cellspacing="0" cellpadding="0" border="0" summary="0">
        <tbody>
         <tr>
          <td>
           <fieldset>
            <legend><?= $gui_admin_adjust_form_con_days_new_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="0">
             <tbody>
              <tr>
               <td><?= $gui_admin_adjust_form_con_days_new_value; ?></td>
               <td>
                <select name="content_days_new" style="width: 50px">
                 <?php
                  // list of possible numbers.
                  for($z = 1; $z < 31; $z++)
                  {
                   echo '<option value="'.-$z.'"';
                   // if existing number, put in current number.
                   if (-$z == $conf_adjust_info['content_days_new'])
                    echo ' selected';
                   echo '>'; 
                   echo $z;
                  }
                 ?>
                </select>
               </td>
              </tr>
             </tbody>
            </table>
           </fieldset>
          </td>
         </tr>
        </tbody>
       </table>
       <br>
       <table cellspacing="0" cellpadding="0" border="0" summary="0">
        <tbody>
         <tr>
          <td>
           <fieldset>
            <legend><?= $gui_admin_adjust_form_welcome_msgs_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="0">
             <tbody>
              <tr>
               <td><?= $gui_admin_adjust_form_welcome_msgs_index; ?></td>
              </tr>
              <tr>
               <td><?php d_s (1, 10); ?></td>
              </tr>
              <tr>
               <td>
                <?php input_textarea ('main_column_welcome', 'width: 100%; height:400px', stripslashes ($conf_adjust_info['main_column_welcome'])); ?>
               </td>
              </tr>
             </tbody>
            </table>
           </fieldset>
          </td>
         </tr>
        </tbody>
       </table>
       <br>
       <table cellspacing="0" cellpadding="0" border="0" summary="0">
        <tbody>
         <tr>
          <td>
           <fieldset>
            <legend><?= $gui_admin_adjust_form_emails_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="0">
             <tbody>
              <tr>
               <td><?= $gui_admin_adjust_form_emails_user_one; ?></td>
               <td><?php input_text ('client_email_address', 'width: 257px', clean_for_display ($conf_adjust_info['client_email_address'])); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_emails_user_two; ?></td>
               <td>
                <table cellpadding="0" cellspacing="0" border="0" summary="">
                 <tbody>
                  <tr>
                   <td colspan="2">
                    <?php input_text ('client_email_nospam', 'width: 257px', clean_for_display ($conf_adjust_info['client_email_nospam'])); ?>
                   </td>
                  </tr>
                  <tr>
                   <td><?php d_s (10, 1); ?></td>
                   <td><?= $gui_admin_adjst_form_email_protect_spam; ?></td>
                  </tr>
                 </tbody>
                </table>
               </td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 4); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_emails_admin_one; ?></td>
               <td><?php input_text ('develo_email_address', 'width: 257px', clean_for_display ($conf_adjust_info['develo_email_address'])); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 4); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_emails_admin_two; ?></td>
               <td>
                <table cellpadding="0" cellspacing="0" border="0" summary="">
                 <tbody>
                  <tr>
                   <td colspan="2">
                    <?php input_text ('develo_email_nospam', 'width: 257px', clean_for_display ($conf_adjust_info['develo_email_nospam'])); ?>
                   </td>
                  </tr>
                  <tr>
                   <td><?php d_s (10, 1); ?></td>
                   <td><?= $gui_admin_adjst_form_email_protect_spam; ?></td>
                  </tr>
                 </tbody>
                </table>
               </td>
              </tr>
             </tbody>
            </table>
           </fieldset>
          </td>
         </tr>
        </tbody>
       </table>
       <br>
       <table cellspacing="0" cellpadding="0" border="0" summary="0">
        <tbody>
         <tr>
          <td>
           <fieldset>
            <legend><?= $gui_admin_adjust_form_gtrm_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="0">
             <tbody>
              <tr>
               <td><?= $gui_admin_adjust_form_gtrm_host; ?></td>
               <td><?php input_text ('holy_host_name', 'width: 264px', clean_for_display ($conf_adjust_info['holy_host_name'])); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_gtrm_port; ?></td>
               <td><?php input_text ('holy_port_number', 'width: 264px', $conf_adjust_info['holy_port_number']); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_gtrm_again; ?></td>
               <td>
                <select name="holy_repeat_number" style="width: 264px">
                 <?php
                  // list of possible numbers.
                  for($z = 1; $z != 11; $z++)
                  {
                   echo '<option value="'.$z.'"';
                   // if existing number, put in current number.
                   if ($z == $conf_adjust_info['holy_repeat_number'])
                    echo ' selected';
                   echo '>'; 
                   echo $z;
                  }
                 ?>
                </select>
               </td>
              </tr>
             </tbody>
            </table>
           </fieldset>
          </td>
         </tr>
        </tbody>
       </table>
       <br>
       <table cellspacing="0" cellpadding="0" border="0" summary="0">
        <tbody>
         <tr>
          <td>
           <fieldset>
            <legend><?= $gui_admin_adjust_form_col_txts_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="0">
             <tbody>
              <tr>
               <td><?= $gui_admin_adjust_form_col_txts_top; ?></td>
               <td><?php input_text ('top_center_item_title', 'width: 250px', clean_for_display ($conf_adjust_info['top_center_item_title'])); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_col_txts_left; ?></td>
               <td><?php input_text ('left_column_title', 'width: 250px', clean_for_display ($conf_adjust_info['left_column_title'])); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s(1, 2); ?></td>
              </tr>
              <tr>
               <td><?= $gui_admin_adjust_form_col_txts_main; ?></td>
               <td><?php input_text ('main_column_title', 'width: 250px', clean_for_display ($conf_adjust_info['main_column_title'])); ?></td>
              </tr>
             </tbody>
            </table>
           </fieldset>
          </td>
         </tr>
        </tbody>
       </table>

       <input type="hidden" name="submit_check" value="1">
       <input type="hidden" name="info_id" value="<?= $infoid ?>">

       <center>
        <?php
         echo d_s (1, 16). '<br>';
         input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
        ?>
       </center>
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
