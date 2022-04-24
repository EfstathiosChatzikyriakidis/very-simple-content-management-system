<?php
 // start a session because we
 // need it, for many reasons.
 session_start ();

 // require all global functions.
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
  <title><?= $gui_welcome_title."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_CSS.CSS_INDEX; ?>" type="text/css" rel="stylesheet">
  <link href="<?= DIR_PARENT.DIR_CSS.CSS_MAIN_PRINT; ?>" type="text/css" rel="stylesheet" media="print">
 </head>

 <body>
  <!-- begin template -->
  <div class="no-print-other">
   <table cellspacing="0" cellpadding="0" border="0" class="hundred_persent" summary="">
    <tbody>
     <tr>
      <td colspan="3" height="1">
       <!-- begin top -->
        <table cellspacing="0" cellpadding="0" border="0" summary="">
         <tbody>
          <tr valign="middle" align="center">
           <td width="1">
            <?php
             // get corner item.
             $corner_item = get_corner_item ("top", "left");

             // display the corner item.
             if ($corner_item != false)
              display_corner_item ($corner_item, DIR_PARENT.TEMPLATE_ADMIN.DIR_CORNERS);
            ?>
           </td>
           <td width="100%">
            <?php
             $corner_item = get_corner_item ("top", "center");
             if ($corner_item != false)
              display_corner_item ($corner_item, DIR_PARENT.TEMPLATE_ADMIN.DIR_CORNERS);

             echo '<br>';
             d_s (1, 10);
             echo '<br>';
             echo '- <b>'.clean_for_display ($conf_adjust_info['top_center_item_title']).'</b> -';
            ?>
           </td>
           <td width="1">
            <?php
             $corner_item = get_corner_item ("top", "right");
             if ($corner_item != false)
              display_corner_item ($corner_item, DIR_PARENT.TEMPLATE_ADMIN.DIR_CORNERS);
            ?>
           </td>
          </tr>
         </tbody>
        </table>
        <!-- end top -->
       </td>
      </tr>
      <tr>
       <td colspan="3" height="1"><?php d_s (1, 10); ?></td>
      </tr>
      <tr>
       <td colspan="3" height="1">
        <!-- begin header -->
        <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
         <tbody>
          <tr>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-start.png"; ?>"></td>
           <td class="box_header_fill"><?php d_s (1, 10); ?></td>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-end.png"; ?>"></td>
          </tr>
          <tr>
           <td class="box_left_fill"><?php d_s (10, 1); ?></td>
           <td class="box_bgcolor">
            <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
             <tbody>
              <tr>
               <td class="orange_text">&nbsp;
                <b>
                 <a href="<?= DIR_PARENT.FILENAME_INDEX; ?>"><?= $gui_admin_menu_client_page; ?></a>
                 &nbsp;-&nbsp;
                 <a href="mailto:<?= convert_email (clean_for_display ($conf_adjust_info['develo_email_address'])); ?>"><?= $gui_admin_menu_contact_form; ?></a>
                </b>
               </td>
              </tr>
             </tbody>
            </table>
           </td>
           <td class="box_right_fill"><?php d_s (10, 1); ?></td>
          </tr>
          <tr>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-start.png"; ?>"></td>
           <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-end.png"; ?>"></td>
          </tr>
         </tbody>
        </table>
        <!-- end header -->
       </td>
      </tr>
      <tr>
       <td colspan="3" height="30" nowrap> 
        <b>
         <?php
          // print both date and time.
          date_time ($date_text, $time_text, '&nbsp;&nbsp;');
         ?>
        </b>
       </td>
      </tr>
      <tr>
       <td width="340">
        <!-- begin left column -->
        <table cellspacing="0" cellpadding="0" class="height_hundred_persent" width="340" border="0" summary="">
         <tbody>
          <tr>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-start.png"; ?>"></td>
           <td class="box_header_fill"><?php d_s (1, 10); ?></td>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-end.png"; ?>"></td>
          </tr>
          <tr>
           <td class="box_left_fill"><?php d_s (10, 1); ?></td>
           <td class="box_bgcolor" valign="top">
            <table cellspacing="0" cellpadding="0" class="hundred_persent" border="0" summary="">
             <tbody>
              <tr>
               <td valign="top">
                <table cellspacing="0" cellpadding="0" class="hundred_persent" border="0" summary="">
                 <tbody>
                  <tr>
                   <td align="center" class="orange_text" height="1" nowrap><b><?= $gui_admin_left_column_title; ?></b></td>
                  </tr>
                  <tr><td height="6"><?php d_s (); ?></td></tr>
                  <tr>
                   <td class="box_line" height="3"><?php d_s (1, 2); ?></td>
                  </tr>
                  <tr><td height="6"><?php d_s (); ?></td></tr>
                  <tr>
                   <td valign="top">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                     <tbody>
                      <tr>
                       <td><b><?= $gui_admin_left_column_txt; ?></b><br><?php d_s (1, 8); ?><br></td>
                      </tr>
                      <tr>
                       <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                         <tbody>
                          <tr><td width="15" rowspan="20">&nbsp;</td><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                          <tr>
                           <td>- <a href="<?= DIR_CAT_CON.FILENAME_ADD_CAT_CON; ?>" target="main_column"><?= $gui_admin_op_add_cat_con; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_CAT_CON.FILENAME_UPDATE_CAT_CON; ?>" target="main_column"><?= $gui_admin_op_update_cat_con; ?></a>.</td>
                          </tr>
                          <tr><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                          <tr>
                           <td>- <a href="<?= DIR_GRAPHIC_TEXT.FILENAME_ADD_GRAPHIC_TEXT; ?>" target="main_column"><?= $gui_admin_op_add_links; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_GRAPHIC_TEXT.FILENAME_UPDATE_GRAPHIC_TEXT; ?>" target="main_column"><?= $gui_admin_op_update_links; ?></a>.</td>
                          </tr>
                          <tr><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                          <tr>
                           <td>- <a href="<?= DIR_BANNER.FILENAME_ADD_BANNER_FORM; ?>" target="main_column"><?= $gui_admin_op_add_banners; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_BANNER.FILENAME_BANNERS_LIST; ?>" target="main_column"><?= $gui_admin_op_update_banners; ?></a>.</td>
                          </tr>
                          <tr><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                          <tr>
                           <td>- <a href="<?= DIR_PAGE_COUNTERS.FILENAME_PAGE_COUNTERS_LIST; ?>" target="main_column"><?= $gui_admin_op_update_page_counters; ?></a>.</td>
                          </tr>
                          <tr><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                          <tr>
                           <td>- <a href="<?= DIR_CORNER_ITEMS.FILENAME_CORNER_ITEMS_LIST; ?>" target="main_column"><?= $gui_admin_op_update_corners; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_COMPS_STATUS.FILENAME_COMPS_STATUS_LIST; ?>" target="main_column"><?= $gui_admin_op_update_components; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_ADJUST_INFO.FILENAME_UPDATE_ADJUST_INFO_FORM."?infoid=1" ?>" target="main_column"><?= $gui_admin_op_update_adjust; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_EDIT_FILES.FILENAME_EDIT_FILES_LIST; ?>" target="main_column"><?= $gui_admin_op_edit_files; ?></a>.</td>
                          </tr>
                          <tr><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                          <tr>
                           <td>- <a href="<?= DIR_UPLOAD_GRAPHICS.FILENAME_UPLOAD_GRAPHICS_FORM; ?>" target="main_column"><?= $gui_admin_op_upload_graphics; ?></a>.</td>
                          </tr>
                          <tr>
                           <td>- <a href="<?= DIR_BROWSE_GRAPHICS.FILENAME_BROWSE_GRAPHICS; ?>" target="_blank"><?= $gui_admin_op_browse_graphics; ?></a>.</td>
                          </tr>
                          <tr><td><hr align="left" size="1" noshade="noshade" width="60%"></td></tr>
                         </tbody>
                        </table>
                       </td>
                      </tr>
                     </tbody>
                    </table>
                   </td>
                  </tr>
                 </tbody>
                </table>
               </td>
              </tr>
             </tbody>
            </table>
           </td>
           <td class="box_right_fill"><?php d_s (10, 1); ?></td>
          </tr>
          <tr>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-start.png"; ?>"></td>
           <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-end.png"; ?>"></td>
          </tr>
         </tbody>
        </table>
        <!-- end left column -->
       </td>
       <td width="1"><?php d_s (20, 1); ?></td>
       <td>
        <!-- begin main column -->
        <table cellspacing="0" cellpadding="0" class="height_hundred_persent" width="100%" border="0" summary="">
         <tbody>
          <tr>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-start.png"; ?>"></td>
           <td class="box_header_fill"><?php d_s (1, 10); ?></td>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-end.png"; ?>"></td>
          </tr>
          <tr>
           <td class="box_left_fill"><?php d_s (10, 1); ?></td>
           <td class="box_bgcolor" valign="top">
            <table cellspacing="0" cellpadding="0" width="100%" border="0" class="height_hundred_persent" summary="">
             <tbody>
              <tr>
               <td>
                <table cellspacing="0" cellpadding="0" width="100%" class="height_hundred_persent" border="0" summary="">
                 <tbody>
                  <tr>
                   <td class="orange_text" align="center" height="1" nowrap><b><?= $gui_admin_right_column_title; ?></b></td>
                  </tr>
                  <tr><td height="6"><?php d_s (); ?></td></tr>
                  <tr>
                   <td class="box_line" height="3"><?php d_s (1, 2); ?></td>
                  </tr>
                  <tr><td height="6"><?php d_s (); ?></td></tr>
                  <tr>
                   <td><iframe width="100%" src="<?= FILENAME_WELCOME_PAGE; ?>" name="main_column" height="100%" frameborder="0"></iframe></td>
                  </tr>
                 </tbody>
                </table>
               </td>
              </tr>
             </tbody>
            </table>
           </td>
           <td class="box_right_fill"><?php d_s (10, 1); ?></td>
          </tr>
          <tr>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-start.png"; ?>"></td>
           <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
           <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-end.png"; ?>"></td>
          </tr>
         </tbody>
        </table>
        <!-- end main column -->
       </td>
      </tr>
      <tr>
       <td colspan="3" height="30" nowrap><?= PROJECT_INFO; ?></td>
      </tr>
      <tr>
       <td colspan="3" height="1">
        <!-- begin footer -->
        <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
         <tbody>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-start.png"; ?>"></td>
          <td class="box_header_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-header-end.png"; ?>"></td>
         </tr>
         <tr>
          <td class="box_left_fill"><?php d_s (10, 1); ?></td>
          <td class="box_bgcolor">
           <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
            <tbody>
             <tr>
              <td>
               <table cellpadding="1" cellspacing="0" border="0" summary="">
                <tbody>
                 <tr>
                  <td colspan="2" nowrap>
                   <?php
                    // use a counter for this page.
                    // be visible as a counter (`1' parameter).
                    page_counter ($gui_page_counter_message, 1);
                   ?>
                  </td>
                 </tr>
                 <tr>
                  <td nowrap><b><?= $gui_admin_developer_email; ?></b></td>
                  <td>
                   <?php
                    echo ' <img src="'.DIR_PARENT.FILENAME_STRING_TO_IMAGE.'?string='.convert_email (clean_for_display ($conf_adjust_info['develo_email_address']))." (".convert_email (clean_for_display ($conf_adjust_info['develo_email_nospam']), 1).")".'" border="0" alt="'.convert_email (clean_for_display ($conf_adjust_info['develo_email_nospam']), 1).'">';
                   ?>
                  </td>
                 </tr>
                </tbody>
               </table>
              </td>
             </tr>
            </tbody>
           </table>
          </td>
          <td class="box_right_fill"><?php d_s (10, 1); ?></td>
         </tr>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-start.png"; ?>"></td>
          <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= DIR_PARENT.TEMPLATE_ADMIN.DIR_BOX."box-footer-end.png"; ?>"></td>
         </tr>
        </tbody>
       </table>
       <!-- end footer -->
     </td>
    </tr>
    <tr>
     <td colspan="3" height="1">
      <?= d_s (1, 10); ?>
     </td>
    </tr>
    <tr>
     <td colspan="3" height="1">
      <!-- begin bottom -->
      <table cellspacing="0" cellpadding="0" border="0" class="hundred_persent" summary="">
       <tbody>
        <tr>
         <td nowrap>
          <?php
           // use an online counter.
           online_users ();
          ?>
         </td>
        </tr>
        <tr>
         <td>
          <?= d_s (1, 10); ?>
         </td>
        </tr>
        <tr>
         <td nowrap>
          <?= $gui_admin_client_use_license; ?><u><a href="http://creativecommons.org/licenses/by-nd/3.0/" target="_blank"><b><?= $gui_admin_client_gnu_fdl_license; ?></b></a></u>.
         </td>
        </tr>
        <tr>
         <td>
          <?= d_s (1, 10); ?>
         </td>
        </tr>
        <tr>
         <td>
          <table cellspacing="0" cellpadding="0" border="0" class="" summary="">
           <tbody>
            <tr>
             <td><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."w3c-html-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."w3c-css-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://www.php.net/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."php-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="<?= 'http://validator.w3.org/feed/check.cgi?url=http://'.$conf_http_host.SLASH.RSS_FILE; ?>" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."rss-valid-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://unicode.org/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."utf8-encoded-banner.png"; ?>" border="0" alt=""></a></td>
            </tr>
            <tr><td><?= d_s (1, 3); ?></td></tr>
            <tr>
             <td><a href="<?= 'http://'.$conf_http_host.SLASH.RSS_FILE; ?>" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."rss-news-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://tinymce.moxiecode.com/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."tinymce-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://bluefish.openoffice.nl/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."bluefish-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://dev.mysql.com/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."mysql-db-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://www.nosoftwarepatents.com/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."no-software-patents-banner.png"; ?>" border="0" alt=""></a></td>
            </tr>
            <tr><td><?= d_s (1, 3); ?></td></tr>
            <tr>
             <td><a href="http://www.gimp.org/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."thegimp-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://www.mozilla.org/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."mozilla-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://www.gnu.org/philosophy/gif.html" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."no-gifs-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://www.phpfreechat.net/" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."phpfreechat-banner.png"; ?>" border="0" alt=""></a></td>
             <td><?= d_s (3, 1); ?></td>
             <td><a href="http://www.gnu.org/licenses/fdl.html" target="_blank"><img src="<?= DIR_PARENT.DIR_GRAPHICS."gnu-fdl-banner.png"; ?>" border="0" alt=""></a></td>
            </tr>
           </tbody>
          </table>
         </td>
        </tr>
        </tbody>
       </table>
       <!-- end bottom -->
      </td>
     </tr>
    </tbody>
   </table>
  </div>
  <!-- end template -->
 </body>

</html>
