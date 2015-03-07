<?php
 // start a session because we
 // need it, for many reasons.
 session_start ();

 // require all global functions.
 require_once ("vs-cms-fns.php");
?>

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
 // try to have catid.
 $catid = $_GET['catid'];

 // is used for error checking.
 $catid_error = false;

 // check to see if there is a catid.
 if (!var_exist ($catid))
  $catid_error = true;
 else
 {
  // get the navigation path.
  $path = get_cat_path ($catid);

  // get this category out of database.
  $category = get_category_details ($catid);
 }
?>

<html>

 <head>
  <title>
   <?php
    // print the navigation path.
    echo $gui_welcome_title." > ";
  
    // if the category doesnt has
    // as parent the root node.
    if (!empty ($path))
     for ($i = 0; $i < count ($path); $i++)
     {
      $cat = get_category_details ($path[$i]);
      echo clean_for_display ($cat['cat_name']) . ' > ';
     }

    echo clean_for_display ($category['cat_name']).'.';
   ?>
  </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet" media="screen">
  <link href="<?= TEMPLATE.DIR_CSS.PREFIX_CSS_FILENAME_TEXT_SIZE.$conf_text_size_mode.".css"; ?>" type="text/css" rel="stylesheet" media="screen">
  <link href="<?= DIR_CSS.CSS_MAIN_PRINT; ?>" type="text/css" rel="stylesheet" media="print">
 </head>

 <body>

  <!-- begin show category page -->

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
       echo $gui_you_can_go_to.'&nbsp;<a href="'.FILENAME_INDEX.'"><b>'.$gui_go_to_index_page.'</b></a>.';
      ?>
     </td>
    </tr>
   </tbody>
  </table>

  <?php } else { ?>

  <?php if (strcmp ($conf_broswer_name, 'ie')) { ?>

  <div class="no-print-other">
   <div class="parent-navigation">
    <table cellspacing="0" cellpadding="2" border="0" summary="">
     <tbody>
      <tr>
       <td><a href="#top"><img src="<?= DIR_GRAPHICS."top-arrow.png"; ?>" border="0" alt=""></a></td>
      </tr>
      <tr>
       <td><a href="#bottom"><img src="<?= DIR_GRAPHICS."bottom-arrow.png"; ?>" border="0" alt=""></a></td>
      </tr>
     </tbody>
    </table>
   </div>
  </div>

  <?php } else { } ?>

  <div id="print-top">
   <div class="border-box">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
     <tbody>
      <tr align="center" valign="middle">
       <td width="90" class="small-text-top" height="80">
        <b>
         <?php
          echo $conf_domain_name;
         ?>
        </b>
       </td>
       <td>
        <div id="center-border-box">
         <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
          <tbody>
           <tr align="center" valign="middle">
            <td height="80">
             <table cellspacing="0" cellpadding="0" border="0" summary="">
              <tbody>
               <tr>
                <td>
                 <img src="<?= DIR_GRAPHICS."print-left-graphic.png"; ?>" alt="">
                </td>
                <td width="10">&nbsp;</td>
                <td>
                 <img src="<?= DIR_GRAPHICS."print-center-graphic.png"; ?>" alt="">
                </td>
                <td width="10">&nbsp;</td>
                <td>
                 <img src="<?= DIR_GRAPHICS."print-right-graphic.png"; ?>" alt="">
                </td>
               </tr>
              </tbody>
             </table>
            </td>
           </tr>
          </tbody>
         </table>
        </div>
       </td>
      </tr>
      <tr>
       <td colspan="3">
        <div id="bottom-border-box">
         <table cellspacing="0" cellpadding="0" width="100%" border="0" summary="">
          <tbody>
           <tr>
            <td height="25">
             <table cellspacing="0" cellpadding="0" border="0" summary="">
              <tbody>
               <tr>
                <td nowrap class="small-text-top">&nbsp;&nbsp;<b><?= $gui_print_content_source_txt; ?></b><?= 'http://'.$conf_http_host .$conf_script_query; ?></td>
                <td width="100%">&nbsp;</td>
                <td nowrap class="small-text-top">
                 <?php
                  date_time ('', '', '&nbsp; - &nbsp;');

                  if (!strcmp ($conf_broswer_name, 'ie'))
                  {
                   echo '&nbsp;&nbsp;';
                  }
                  else { }
                ?>
                </td>
               </tr>
              </tbody>
             </table>
            </td>
           </tr>
          </tbody>
         </table>
        </div>
       </td>
      </tr>
     </tbody>
    </table>
   </div>
  </div>
  <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
   <tbody>
    <tr>
     <td height="1" colspan="2"><div class="no-print-other"><a name="top"><?= d_s (1, 1); ?></a></div></td>
    </tr>
    <tr>
     <td valign="top" width ="100%" height="1">
      <div id="navigation">
       <b>
        <?php
         // if the category doesnt has as parent the root node.
         if (!empty ($path))
          for ($i = 0; $i < count ($path); $i++)
          {
           $cat = get_category_details ($path[$i]);

           // the show link.
           $show_url    = FILENAME_SHOW_CATEGORY.'?catid='.($cat['cat_id']);
           $show_text   = clean_for_display ($cat['cat_name']);
           $show_title  = clean_for_display ($cat['cat_description']);
           $show_target = "_self";

           echo '<a href="'.$show_url.'" title="'.$show_title.'" target="'.$show_target.'">'.$show_text.'</a> > ';
          }

         echo clean_for_display ($category['cat_name']).'.';
        ?>
       </b>
      </div>
     </td>
     <td align="right" width="1">
      <div id="right-operations">
       <table cellspacing="0" cellpadding="0" border="0" summary="">
        <tbody>
         <tr>
          <td><a title="<?=$gui_new_window_con_txt; ?>" href="#" target="_blank"><img src="<?= TEMPLATE.DIR_GRAPHICS."firefox-icon.png"; ?>" border="0" alt="<?=$gui_new_window_con_txt; ?>"></a></td>
          <td><a href="javascript:this.print();" title="<?=$gui_print_content_txt; ?>"><img src="<?= TEMPLATE.DIR_GRAPHICS."print-icon.png"; ?>" border="0" hspace="5" alt="<?=$gui_print_content_txt; ?>"></a></td>
          <td nowrap>
           <?php
            echo '[&nbsp;<a href="'.FILENAME_RESIZE_TEXT.'?size=small">'.$gui_zoom_small_txt.'</a>&nbsp;&nbsp;<a href="'.FILENAME_RESIZE_TEXT.'?size=medium">'.$gui_zoom_medium_txt.'</a>&nbsp;&nbsp;<a href="'.FILENAME_RESIZE_TEXT.'?size=large">'.$gui_zoom_large_txt.'</a> ]';
           ?>
          </td>
          <td><?php d_s (8, 1); ?></td>
          <?php if (!strcmp ($conf_broswer_name, 'ie')) { ?>
          <td><a href="#bottom"><img src="<?= DIR_GRAPHICS."bottom-arrow.png"; ?>" border="0" alt=""></a></td>
          <td><?php d_s (8, 1); ?></td>
          <?php } else { } ?>
         </tr>
        </tbody>
       </table>
      </div>
     </td>
    </tr>
    <tr><td height="1" colspan="2"><br></td></tr>
    <tr>
     <td colspan="2">
      <?php
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
       echo "<b><u>".$gui_cat_description."</u></b>";
      ?>
     </td>
    </tr>
    <tr><td height="1" colspan="2"><br></td></tr>
    <tr>
     <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
       <tbody>
        <tr>
         <td width="1"><?= d_s (25, 1); ?></td>
         <?php
          if ($category['cat_graphic'] != "no")
          {
           echo '<td width="1">';

           // check to see if the graphic file exists.
           if (@file_exists (DIR_CATS.clean_for_display ($category['cat_graphic'])))
           {
            echo '<img src="'.DIR_CATS.clean_for_display ($category['cat_graphic']).'" ';
            echo 'border="1" height="40" width="30" align="right" alt="">';
           }
           else
            echo '<div class="no-print-other"><br><center>'.$there_is_no_graphic.'</center></div>';
          
           echo "</td>";
           echo '<td width="1">';
           echo   d_s (25, 1);
           echo '</td>'; 
          }
         ?>
         <td style="text-align: justify">
          <?php
           echo clean_for_display ($category['cat_description']);
          ?>
         </td>
         <td width="1"><?= d_s (35, 1); ?></td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr><td colspan="2"><br></td></tr>
    <?php
     // has the category subcategories?
     $get_options = get_cat_selectlist ($catid, 0, 1);
     if (count ($get_options) > 0)
     {
    ?>
    <tr>
     <td colspan="2">
      <?php
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
       echo "<b><u>".$gui_cat_subcats."</u></b>";
      ?>
     </td>
    </tr>
    <tr><td colspan="2"><br></td></tr>
    <tr>
     <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
       <tbody>
        <tr>
         <td>
          <blockquote>
           <table cellpadding="0" cellspacing="2" border="0" summary="">
            <tbody>
             <?php
              // create each url link for each category.
              foreach ($get_options as $key => $value)
              {
               // get this category out of database.
               $subcat = get_category_details ($key);

               // the show link.
               $show_url    = FILENAME_SHOW_CATEGORY.'?catid='.($subcat['cat_id']);
               $show_text   = clean_for_display ($value);
               $show_title  = clean_for_display ($subcat['cat_description']);
               $show_target = "_self";

               // get number of contents.
               $number = get_cat_num_contents ($subcat['cat_id']);

               // print category info.
               echo  ' <tr>';

               echo  '  <td>'.do_html_url ($show_url, $show_text, $show_title, $show_target).'.</td>';
               echo  '  <td>';

               if ($number == 0)
               {
                echo '<table cellpadding="0" cellspacing="0" border="0" summary="">';
                echo ' <tbody>';
                echo '  <tr>';
                echo '   <td>&nbsp;&nbsp;(</td>';
                echo '   <td valign="middle"><img src="'.DIR_GRAPHICS.'directory-icon.png" border="0" alt=""></td>';
                echo '   <td>)</td>';
                echo  ' </tr>';
                echo ' </tbody>';
                echo '</table>';
               }
               else
                echo '&nbsp;&nbsp;(<b>'.$number.'</b>)';

               echo  '  </td>';
               echo  ' </tr>';
              }
             ?>
            </tbody>
           </table>
          </blockquote>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <?php
      if (!strcmp ($conf_broswer_name, 'ie'))
      {
    ?>
    <tr>
     <td colspan="2">
      <div class="print-other"><br></div>
     </td>
    </tr>
    <?php
      }
      else
       ;
     }

     // has the category contents?
     $cat_cons = get_cat_num_contents ($catid);
     if ($cat_cons > 0)
     {
    ?>
    <tr>
     <td colspan="2">
      <?php
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
       echo "<b><u>".$gui_cat_contents."</u></b>";
      ?>
     </td>
    </tr>
    <tr><td colspan="2"><br></td></tr>
    <tr>
     <td colspan="2">
      <?php
       // get the contents for the appropriate category.
       $content_array = get_contents ($catid);

       // display all contents for the appropriate category.
       display_contents_user ($content_array, FILENAME_SHOW_CONTENT);
      ?>
     </td>
    </tr>
    <?php
     }
    ?>
    <?php if (!strcmp ($conf_broswer_name, 'ie')) { ?>
    <tr><td height="1" colspan="2"><br></td></tr>
    <tr>
     <td align="right" colspan="2">
      <div class="no-print-other">
       <table cellspacing="0" cellpadding="0" border="0" summary="">
        <tbody>
         <tr>
          <td><a href="#top"><img src="<?= DIR_GRAPHICS."top-arrow.png"; ?>" border="0" alt=""></a></td>
          <td><?php d_s (8, 1); ?></td>
         </tr>
        </tbody>
       </table>
      </div>
     </td>
    </tr>
    <?php } else { } ?>
    <tr>
     <td height="1" colspan="2"><div class="no-print-other"><a name="bottom"><?= d_s (1, 1); ?></a></div></td>
    </tr>
   </tbody>
  </table>
  <div id="print-bottom">
   <?php
    if (strcmp ($conf_broswer_name, 'ie'))
    {
     echo '<br>';
    }
    else { }
   ?>
   <div class="border-box">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
     <tbody>
      <tr>
       <td align="center" valign="middle" class="small-text-bottom" height="25"><?= $gui_print_bottom_license_txt; ?></td>
      </tr>
     </tbody>
    </table>
   </div>
  </div>

  <?php } ?>

  <!-- end show category page -->
 </body>

</html>
