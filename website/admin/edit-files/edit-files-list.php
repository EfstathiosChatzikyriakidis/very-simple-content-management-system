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
  <script language="javaScript" type="text/javascript">
   <!--
    function change_poll (opt_list)
    {
     var poll = opt_list.options[opt_list.selectedIndex].value;
     window.location = "<?= FILENAME_EDIT_FILE_FORM; ?>?file_path=<?= DIR_PARENT.DIR_PARENT.DIR_COMPONENTS.DIR_POLLS; ?>polldata/" + poll;
    }
   //-->
  </script>
 </head>

 <body>
  <!-- begin edit files list page -->
  <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_admin_edit_files_select_list; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
    <tr>
     <td>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.FILENAME_WEB_MESSAGES; ?>" target="_blank"><?= $gui_admin_edit_files_web_messages_txt; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.TEMPLATE.DIR_CSS.CSS_MAIN; ?>" target="_blank"><?= $gui_admin_edit_files_main_css_txt; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.TEMPLATE.DIR_CSS.CSS_INDEX; ?>" target="_blank"><?= $gui_admin_edit_files_index_css_txt; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.FILENAME_RANDOM_MESSAGES; ?>" target="_blank"><?= $gui_admin_edit_files_random_messages_txt; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.RSS_FILE; ?>" target="_blank"><?= $gui_admin_edit_files_rss_file_txt; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.FILENAME_INDEX; ?>" target="_blank"><?= $gui_admin_edit_files_index_file_txt; ?></a>.
      <br>
      <?php d_s (10, 1); ?>- <a href="<?= FILENAME_EDIT_FILE_FORM."?file_path=".DIR_PARENT.DIR_PARENT.PLAYLIST_FILE; ?>" target="_blank"><?= $gui_admin_edit_files_playlist_file_txt; ?></a>.
      <p>
       <?php d_s (10, 1); ?>- <?= $gui_admin_edit_files_polls_txt; ?>.
       <p>
        <?php select_file (DIR_PARENT.DIR_PARENT.DIR_COMPONENTS.DIR_POLLS."polldata", "", "select_poll", 'width: 110px', 'change_poll (this);'); ?>
       </p>
      </p>
     </td>
    </tr>
    <tr>
     <td><?php d_s (1, 15); ?></td>
    </tr>
   </tbody>
  </table>
  <!-- end edit files list page -->
 </body>

</html>
