<?php
 // start a session because we
 // need it, for many reasons.
 session_start ();

 // require all global functions.
 require_once ("vs-cms-fns.php");

 // require for printing banner links.
 require (FILENAME_BANNER_LINKS);
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
  <meta http-equiv="Page-Enter" content="revealTrans(transition=23, duration=2)">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="keywords" content="<?= $gui_meta_keywords; ?>">
  <meta name="description" content="<?= $gui_meta_desc; ?>">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= 'http://'.$conf_http_host.SLASH.RSS_FILE; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_INDEX; ?>" type="text/css" rel="stylesheet">
  <link href="<?= DIR_CSS.CSS_MAIN_PRINT; ?>" type="text/css" rel="stylesheet" media="print">
  <script language="javaScript" type="text/javascript">
   <!--
    function change_temp (opt_list)
    {
     var template_directory = opt_list.options[opt_list.selectedIndex].value;
     window.location = "<?= FILENAME_INDEX; ?>?template=" + template_directory;
    }
   //-->
  </script>
 </head>

 <body>
  <!-- begin template -->
   <table cellspacing="0" cellpadding="0" border="0" class="hundred_persent" summary="">
    <tbody>
     <tr>
      <td colspan="3" height="1">
       <!-- begin top -->
       <div class="no-print-other">
       <table cellspacing="0" cellpadding="0" border="0" summary="" width="100%">
        <tbody>
         <tr valign="middle" align="center">
          <td width="1">
           <?php
            // get corner item and display it.
            $corner_item = get_corner_item ("top", "left");
            if ($corner_item != false)
             display_corner_item ($corner_item, TEMPLATE.DIR_CORNERS);
           ?>
          </td>
          <td width="100%" nowrap>
           <?php
            $corner_item = get_corner_item ("top", "center");
            if ($corner_item != false)
             display_corner_item ($corner_item, TEMPLATE.DIR_CORNERS);
            
            // display center message.
            echo '<br>';
            d_s (1, 10);
            echo '<br>';
            
            echo '- <b>'. clean_for_display ($conf_adjust_info['top_center_item_title']).'</b> -';
           ?>
          </td>
          <td width="1">
           <?php
            $corner_item = get_corner_item ("top", "right");
            if ($corner_item != false)
             display_corner_item ($corner_item, TEMPLATE.DIR_CORNERS);
           ?>
          </td>
         </tr>
        </tbody>
       </table>
       <!-- end top -->
       </div>
      </td>
     </tr>
     <tr><td colspan="3" height="1"><?php d_s (1, 10); ?></td></tr>
     <tr>
      <td colspan="3" height="1">
      <div class="no-print-other">
       <!-- begin header -->
       <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
        <tbody>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-start.png"; ?>"></td>
          <td class="box_header_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-end.png"; ?>"></td>
         </tr>
         <tr>
          <td class="box_left_fill"><?php d_s (10, 1); ?></td>
          <td class="box_bgcolor">
           <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
            <tbody>
             <tr>
              <td class="orange_text" align="center">
               <b>
                &nbsp;<a href="<?= FILENAME_WELCOME_PAGE; ?>" target="main_column"><?= $gui_client_menu_default_page; ?></a>&nbsp;-&nbsp;<a href="<?= FILENAME_SHOW_CATEGORY.'?catid=24'; ?>" target="main_column"><?= $gui_client_menu_about_us; ?></a><?php if (get_comp_status ('left_column')) { ?>&nbsp;-&nbsp;<a href="<?= FILENAME_RANDOM_CONTENT; ?>" target="main_column"><?= $gui_client_menu_random_content; ?></a>&nbsp;-&nbsp;<a href="<?= FILENAME_SEARCH_FORM; ?>" target="main_column"><?= $gui_client_menu_search_form; ?></a><?php } ?>&nbsp;-&nbsp;<a href="<?= FILENAME_CONTACT_FORM; ?>" target="main_column"><?= $gui_client_menu_contact_form; ?></a>&nbsp;-&nbsp;<a href="<?= FILENAME_SHOW_USER_POLLS; ?>" target="main_column"><?= $gui_client_menu_polls_page; ?></a>&nbsp;-&nbsp;<a href="<?= FILENAME_SHOW_TEXT_LINKS; ?>" target="main_column"><?= $gui_client_menu_links_page; ?></a>&nbsp;
               </b>
              </td>
             </tr>
            </tbody>
           </table>
          </td>
          <td class="box_right_fill"><?php d_s (10, 1); ?></td>
         </tr>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-start.png"; ?>"></td>
          <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-end.png"; ?>"></td>
         </tr>
        </tbody>
       </table>
       <!-- end header -->
       </div>
      </td>
     </tr>
     <tr>
      <td colspan="3" height="30"> 
       <div class="no-print-other">
       <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
         <tr>
          <td width="100%">
           <b>
            <?php
            // print both date and time.
            date_time ($date_text, $time_text, '&nbsp;&nbsp;');
            ?>
           </b>
          </td>
         </tr>
        </tbody>
       </table>
       </div>
      </td>
     </tr>
     <tr>
      <?php
       if (get_comp_status ('left_column'))
       {
      ?>
      <td width="200" valign="top">
       <div class="no-print-other">
       <!-- begin left column -->
       <table cellspacing="0" cellpadding="0" class="height_hundred_persent" width="285" border="0" summary="">
        <tbody>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-start.png"; ?>"></td>
          <td class="box_header_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-end.png"; ?>"></td>
         </tr>
         <tr>
          <td class="box_left_fill"><?php d_s (10, 1); ?></td>
          <td class="box_bgcolor" valign="top">
           <table cellspacing="0" cellpadding="0" class="hundred_persent" border="0" summary="">
            <tbody>
             <tr>
              <td valign="top" height="100%">
               <table cellspacing="0" cellpadding="0" class="hundred_persent" border="0" summary="">
                <tbody>
                 <tr>
                  <td align="center" class="orange_text" height="1" nowrap>
                   <?php
                    // display left column title.
                    echo '<b>'. clean_for_display ($conf_adjust_info['left_column_title']).'</b>';
                   ?>
                  </td>
                 </tr>
                 <tr><td height="6"><?php d_s (); ?></td></tr>
                 <tr>
                  <td class="box_line" height="3"><?php d_s (1, 2); ?></td>
                 </tr>
                 <tr><td height="6"><?php d_s (); ?></td></tr>
                 <tr>
                  <td valign="top">
                   <table cellspacing="0" cellpadding="0" class="bg_graphic" border="0" width="100%" summary="">
                    <tbody>
                     <tr>
                      <td><b><?= $gui_client_left_column_txt; ?></b></td>
                     </tr>
                     <tr>
                      <td><?php d_s (1, 10); ?></td>
                     </tr>
                     <tr>
                      <td>
                       <?php
                        // get categories out of database.
                        $cat_array = get_categories ();

                        // display as links to cat pages.
                        display_categories_user ($cat_array, FILENAME_SHOW_CATEGORY);
                       ?>
                      </td>
                     </tr>
                     <tr>
                      <td><?php d_s (1, 10); ?></td>
                     </tr>
                     <tr>
                      <td height="100%" valign="middle" align="center">
                       <table cellpadding="0" cellspacing="0" border="0" summary="">
                        <tbody align="center">
                         <tr>
                          <td nowrap><b><?=$gui_client_selections_title_txt; ?></b></td>
                         </tr>
                         <tr>
                          <td><?php d_s (1, 10); ?></td>
                         </tr>
                         <tr>
                          <td><a href="<?= 'http://'.$conf_http_host.SLASH.RSS_FILE; ?>" target="_blank"><img src="<?= DIR_GRAPHICS."rss-news-banner.png"; ?>" border="0" alt=""></a></td>
                         </tr>
                        </tbody>
                       </table>
                      </td>
                     </tr>
                     <tr>
                      <td><?php d_s (1, 10); ?></td>
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
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-start.png"; ?>"></td>
          <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-end.png"; ?>"></td>
         </tr>
        </tbody>
       </table>
       <!-- end left column -->
       </div>
      </td>
      <td width="1"><?php d_s (20, 1); ?></td>
      <?php
       }
      ?>
      <td width="100%">
       <!-- begin main column -->
       <table cellspacing="0" cellpadding="0" class="height_hundred_persent" width="100%" border="0" summary="">
        <tbody>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-start.png"; ?>"></td>
          <td class="box_header_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-end.png"; ?>"></td>
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
                  <td align="center" class="orange_text" height="1" nowrap>
                   <?php
                    // display main column title.
                    echo '<b>'.clean_for_display ($conf_adjust_info['main_column_title']).'</b>';
                   ?>
                  </td>
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
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-start.png"; ?>"></td>
          <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-end.png"; ?>"></td>
         </tr>
        </tbody>
       </table>
       <!-- end main column -->
      </td>
     </tr>
     <tr>
      <td colspan="3" height="30">
       <div class="no-print-other">
       <table cellpadding="1" cellspacing="0" border="0" summary="">
        <tbody>
         <tr>
          <td nowrap><b><?= $gui_client_after_columns_txt; ?></b></td>
          <td>
           <?php
            echo '<img src="'.FILENAME_STRING_TO_IMAGE.'?string='.convert_email (clean_for_display ($conf_adjust_info['client_email_address']))." (".convert_email (clean_for_display ($conf_adjust_info['client_email_nospam']), 1).")".'" border="0" alt="'.convert_email (clean_for_display ($conf_adjust_info['client_email_nospam']), 1).'">';
           ?>
          </td>
         </tr>
        </tbody>
       </table>
       </div>
      </td>
     </tr>
     <?php
      if (get_comp_status ('footer_part'))
       {
     ?>
     <tr>
      <td colspan="3" height="1">
       <!-- begin footer -->
       <div class="no-print-other">
       <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
        <tbody>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-start.png"; ?>"></td>
          <td class="box_header_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-header-end.png"; ?>"></td>
         </tr>
         <tr>
          <td class="box_left_fill"><?php d_s (10, 1); ?></td>
          <td class="box_bgcolor">
           <table cellspacing="0" cellpadding="0" border="0" summary="">
            <tbody>
             <tr>
              <td class="orange_text">&nbsp;&nbsp;<b><i><?= $gui_client_footer_sent_txt; ?></i></b></td>
              <td><?php d_s (5, 1); ?></td>
              <td class="orange_text" align="justify"> 
               <b>
                <?php
                 // get '$max_number' holy sentences.
                 $holy_max_number = $conf_adjust_info['holy_repeat_number'];

                 // check to see if there is a local random messages
                 // file. if there is get a random message and print.
                 if (file_exists (FILENAME_RANDOM_MESSAGES))
                  {
                   if (!is_readable (FILENAME_RANDOM_MESSAGES))
                    {
                     echo '*** '.$there_is_no_r_file_perms;
                    }
                   else
                    {
                     $file_array   = file  (FILENAME_RANDOM_MESSAGES);
                     $max_num_line = count ($file_array);

                     for ($i = 0; $i < $holy_max_number; $i++)
                     {
                      $string = $file_array [rand (0, $max_num_line-1)];
                      echo $string.'<br>';
                     }
                    }
                  }
                 else // get it from the server.
                  for ($i = 0; $i < $holy_max_number; $i++)
                  {
                   echo get_holy_sentence (clean_for_display ($conf_adjust_info['holy_host_name']), $conf_adjust_info['holy_port_number']).'<br>';
                  }
                ?>
               </b>
              </td>
             </tr>
            </tbody>
           </table>
          </td>
          <td class="box_right_fill"><?php d_s (10, 1); ?></td>
         </tr>
         <tr>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-start.png"; ?>"></td>
          <td class="box_footer_fill"><?php d_s (1, 10); ?></td>
          <td width="10" height="1"><img alt="" src="<?= TEMPLATE.DIR_BOX."box-footer-end.png"; ?>"></td>
         </tr>
        </tbody>
       </table>
       <!-- end footer -->
       </div>
      </td>
     </tr>
     <tr>
      <td colspan="3" height="1"><?php d_s (1, 10); ?></td>
     </tr>
     <?php
      }
     ?>
     <tr>
      <td colspan="3" height="1">
       <div class="no-print-other">
       <!-- begin bottom -->
       <table cellspacing="0" cellpadding="0" border="0" summary="">
        <tbody>
         <tr>
          <td width="100%">
           <table cellspacing="0" cellpadding="0" border="0" summary="">
            <tbody>
             <tr>
              <td nowrap>
               <?php
                // use a counter for this page.
                // be visible as a counter (`1' parameter).
                page_counter ($gui_page_counter_message, 1);

                // use an online counter.
                online_users ();
               ?>
              </td>
             </tr>
             <!--
             <tr>
              <td><?php d_s (1, 10); ?></td>
             </tr>
             <tr>
              <td>
               <table cellpadding="0" cellspacing="0" border="0" summary="">
                <tbody>
                 <tr>
                  <td nowrap><?= $gui_admin_client_audio_player_txt; ?></td>
                  <td><?= d_s (5, 1); ?></td>
                  <td>
                   <object type="application/x-shockwave-flash" data="<?= DIR_FLASHES."audio-player.swf"; ?>" width="200" height="20">
                    <param name="movie" value="<?= DIR_FLASHES."audio-player.swf"; ?>">
                    <param name="quality" value="high">
                    <param name="flashvars" value="<?= $gui_admin_client_audio_player_ops; ?>">
                   </object>
                  </td>
                 </tr>
                </tbody>
               </table>
              </td>
             </tr>
             -->
             <?php
              if (get_comp_status ('choose_template'))
              {
             ?>
             <tr>
              <td><?php d_s (1, 10); ?></td>
             </tr>
             <tr>
              <td>
               <form name="change_template_form" action="#">
                <table cellpadding="0" cellspacing="0" border="0" summary="">
                 <tbody>
                  <tr>
                   <td nowrap><?= $gui_admin_client_use_template; ?></td>
                   <td><?= d_s (10, 1); ?></td>
                   <td><?php select_from_directory (DIR_TEMPLATES.DIR_GUI_GUEST, $conf_temp_style, "template_directory", 'width: 110px', 'change_temp (this);'); ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
               </form>
              </td>
             </tr>
             <?php
              }
              else
              {
               echo '<tr>';
               echo ' <td>';
               echo    d_s (1, 10);
               echo '</td>';
               echo '</tr>';
              }
             ?>
             <tr>
              <td nowrap>
               <?= $gui_admin_client_use_license; ?><u><a href="http://creativecommons.org/licenses/by-nd/3.0/" target="_blank"><b><?= $gui_admin_client_gnu_fdl_license; ?></b></a></u>.
              </td>
             </tr>
            </tbody>
           </table>
          </td>
          <?php
           if (get_comp_status ('banner_links'))
           {
          ?>
          <td align="right" valign="top">
           <?php
            // try to print random banner links.
            random_banner_links ($conf_adjust_info['banner_links_number'], $conf_adjust_info['banner_links_cols']);
           ?>
          </td>
          <?php
           }
          ?>
         </tr>
         <tr>
          <td colspan="2"><?php d_s (1, 10); ?></td>
         </tr>
         <tr>
          <td colspan="2">
           <table cellspacing="0" cellpadding="0" border="0" class="" summary="">
            <tbody>
             <tr>
              <td><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="<?= DIR_GRAPHICS."w3c-html-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="<?= DIR_GRAPHICS."w3c-css-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://www.php.net/" target="_blank"><img src="<?= DIR_GRAPHICS."php-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="<?= 'http://validator.w3.org/feed/check.cgi?url=http://'.$conf_http_host.SLASH.RSS_FILE; ?>" target="_blank"><img src="<?= DIR_GRAPHICS."rss-valid-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://unicode.org/" target="_blank"><img src="<?= DIR_GRAPHICS."utf8-encoded-banner.png"; ?>" border="0" alt=""></a></td>
             </tr>
             <tr><td><?= d_s (1, 3); ?></td></tr>
             <tr>
              <td><a href="<?= 'http://'.$conf_http_host.SLASH.RSS_FILE; ?>" target="_blank"><img src="<?= DIR_GRAPHICS."rss-news-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://tinymce.moxiecode.com/" target="_blank"><img src="<?= DIR_GRAPHICS."tinymce-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://bluefish.openoffice.nl/" target="_blank"><img src="<?= DIR_GRAPHICS."bluefish-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://dev.mysql.com/" target="_blank"><img src="<?= DIR_GRAPHICS."mysql-db-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://www.nosoftwarepatents.com/" target="_blank"><img src="<?= DIR_GRAPHICS."no-software-patents-banner.png"; ?>" border="0" alt=""></a></td>
             </tr>
             <tr><td><?= d_s (1, 3); ?></td></tr>
             <tr>
              <td><a href="http://www.gimp.org/" target="_blank"><img src="<?= DIR_GRAPHICS."thegimp-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://www.mozilla.org/" target="_blank"><img src="<?= DIR_GRAPHICS."mozilla-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://www.gnu.org/philosophy/gif.html" target="_blank"><img src="<?= DIR_GRAPHICS."no-gifs-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://www.phpfreechat.net/" target="_blank"><img src="<?= DIR_GRAPHICS."phpfreechat-banner.png"; ?>" border="0" alt=""></a></td>
              <td><?= d_s (3, 1); ?></td>
              <td><a href="http://www.gnu.org/licenses/fdl.html" target="_blank"><img src="<?= DIR_GRAPHICS."gnu-fdl-banner.png"; ?>" border="0" alt=""></a></td>
             </tr>
            </tbody>
           </table>
          </td>
         </tr>
         <tr>
          <td colspan="2"><?php d_s (1, 10); ?></td>
         </tr>
         <tr>
          <td colspan="2" nowrap>
           <?= PROJECT_INFO; ?>
          </td>
         </tr>
        </tbody>
       </table>
       <!-- end bottom -->
       </div>
      </td>
     </tr>
    </tbody>
   </table>
  <!-- end template -->
 </body>

</html>
