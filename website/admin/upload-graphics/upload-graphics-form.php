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
  <script language="javascript" type="text/javascript" src="<?= DIR_PARENT.DIR_PARENT.DIR_JS."multi-files.js"; ?>"></script>
  <link rel="icon" type="image/png" href="<?= DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
  
 </head>

 <body>
  <!-- begin upload graphics form page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_upload_insert_graphics; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="400" summary="">
       <tbody>
        <tr>
         <td>
          <fieldset>
           <legend><?= $gui_admin_upload_categories_legend; ?></legend>
           <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
            <tbody>
             <tr>
              <td align="right">
               <form enctype="multipart/form-data" method="post" name="upload_cat_form" action="<?= FILENAME_UPLOAD_GRAPHICS; ?>">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                 <tbody valign="bottom">
                  <tr>
                   <td>
                    - <?= $gui_admin_upload_insert_graphics; ?><br><?= d_s (1, 6); ?><br><?php input_file ('upload_file_1', 'id="my_file_element_1"'); ?><br><br>
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                     <tbody>
                      <tr>
                       <td align="right">
                        <div id="files_list_1"></div>
                       </td>
                      </tr>
                     </tbody>
                    </table>
                   </td>
                  </tr>
                  <tr>
                   <td align="right">
                    <?php
                     echo input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
                    ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= FILE_MAX_SIZE; ?>">
                <input type="hidden" name="upload_cat_submit" value="1"> 
               </form>
              </td>
             </tr>
            </tbody>
           </table>
          </fieldset>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="400" summary="">
       <tbody>
        <tr>
         <td>
          <fieldset>
           <legend><?= $gui_admin_upload_contents_legend; ?></legend>
           <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
            <tbody>
             <tr>
              <td align="right">
               <form enctype="multipart/form-data" method="post" name="upload_con_form" action="<?= FILENAME_UPLOAD_GRAPHICS; ?>">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                 <tbody valign="bottom">
                  <tr>
                   <td>
                    - <?= $gui_admin_upload_insert_graphics; ?><br><?= d_s (1, 6); ?><br><?php input_file ('upload_file_1', 'id="my_file_element_2"'); ?><br><br>
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                     <tbody>
                      <tr>
                       <td align="right">
                        <div id="files_list_2"></div>
                       </td>
                      </tr>
                     </tbody>
                    </table>
                   </td>
                  </tr>
                  <tr>
                   <td align="right">
                    <?php
                     echo input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
                    ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= FILE_MAX_SIZE; ?>">
                <input type="hidden" name="upload_con_submit" value="1"> 
               </form>
              </td>
             </tr>
             <tr>
              <td>
              </td>
             </tr>
            </tbody>
           </table>
          </fieldset>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="400" summary="">
       <tbody>
        <tr>
         <td>
          <fieldset>
           <legend><?= $gui_admin_upload_graphic_links_legend; ?></legend>
           <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
            <tbody>
             <tr>
              <td align="right">
               <form enctype="multipart/form-data" method="post" name="upload_link_form" action="<?= FILENAME_UPLOAD_GRAPHICS; ?>">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                 <tbody valign="bottom">
                  <tr>
                   <td>
                    - <?= $gui_admin_upload_insert_graphics; ?><br><?= d_s (1, 6); ?><br><?php input_file ('upload_file_1', 'id="my_file_element_3"'); ?><br><br>
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                     <tbody>
                      <tr>
                       <td align="right">
                        <div id="files_list_3"></div>
                       </td>
                      </tr>
                     </tbody>
                    </table>
                   </td>
                  </tr>
                  <tr>
                   <td align="right">
                    <?php
                     echo input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
                    ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= FILE_MAX_SIZE; ?>">
                <input type="hidden" name="upload_link_submit" value="1"> 
               </form>
              </td>
             </tr>
             <tr>
              <td>
              </td>
             </tr>
            </tbody>
           </table>
          </fieldset>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="400" summary="">
       <tbody>
        <tr>
         <td>
          <fieldset>
           <legend><?= $gui_admin_upload_banner_links_legend; ?></legend>
           <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
            <tbody>
             <tr>
              <td align="right">
               <form enctype="multipart/form-data" method="post" name="upload_banner_form" action="<?= FILENAME_UPLOAD_GRAPHICS; ?>">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                 <tbody valign="bottom">
                  <tr>
                   <td>
                    - <?= $gui_admin_upload_insert_graphics; ?><br><?= d_s (1, 6); ?><br><?php input_file ('upload_file_1', 'id="my_file_element_4"'); ?><br><br>
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                     <tbody>
                      <tr>
                       <td align="right">
                        <div id="files_list_4"></div>
                       </td>
                      </tr>
                     </tbody>
                    </table>
                   </td>
                  </tr>
                  <tr>
                   <td align="right">
                    <?php
                     echo input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
                    ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= FILE_MAX_SIZE; ?>">
                <input type="hidden" name="upload_banner_submit" value="1"> 
               </form>
              </td>
             </tr>
             <tr>
              <td>
              </td>
             </tr>
            </tbody>
           </table>
          </fieldset>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="400" summary="">
       <tbody>
        <tr>
         <td>
          <fieldset>
           <legend><?= $gui_admin_upload_corners_legend; ?></legend>
           <table cellpadding="0" cellspacing="0" border="0" width="100%" summary="">
            <tbody>
             <tr>
              <td align="right">
               <form enctype="multipart/form-data" method="post" name="upload_corner_form" action="<?= FILENAME_UPLOAD_GRAPHICS; ?>">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                 <tbody valign="bottom">
                  <tr>
                   <td>
                    - <?= $gui_admin_upload_insert_graphics; ?><br><?= d_s (1, 6); ?><br><?php input_file ('upload_file_1', 'id="my_file_element_5"'); ?><br><br>
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
                     <tbody>
                      <tr>
                       <td align="right">
                        <div id="files_list_5"></div>
                       </td>
                      </tr>
                     </tbody>
                    </table>
                   </td>
                  </tr>
                  <tr>
                   <td align="right">
                    <?php
                     echo input_button ('image', 'submit', DIR_PARENT.DIR_PARENT.TEMPLATE_ADMIN.DIR_GRAPHICS."submit.png");
                    ?>
                   </td>
                  </tr>
                 </tbody>
                </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= FILE_MAX_SIZE; ?>">
                <input type="hidden" name="upload_corner_submit" value="1"> 
               </form>
              </td>
             </tr>
             <tr>
              <td>
              </td>
             </tr>
            </tbody>
           </table>
          </fieldset>
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>

  <script language="javascript" type="text/javascript">
   <!--
    var multi_selector = new MultiSelector(document.getElementById('files_list_1'), 0);
    multi_selector.addElement(document.getElementById('my_file_element_1' ));

    var multi_selector = new MultiSelector(document.getElementById('files_list_2'), 0);
    multi_selector.addElement(document.getElementById('my_file_element_2' ));

    var multi_selector = new MultiSelector(document.getElementById('files_list_3'), 0);
    multi_selector.addElement(document.getElementById('my_file_element_3' ));

    var multi_selector = new MultiSelector(document.getElementById('files_list_4'), 0);
    multi_selector.addElement(document.getElementById('my_file_element_4' ));

    var multi_selector = new MultiSelector(document.getElementById('files_list_5'), 0);
    multi_selector.addElement(document.getElementById('my_file_element_5'));
   //-->
  </script>

  <!-- end upload graphics form page -->
 </body>

</html>
