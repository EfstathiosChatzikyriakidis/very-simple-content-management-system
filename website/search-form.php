<?php
 // require all functions.
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
  <title><?= $gui_welcome_title." > ".$gui_search_form_title."."; ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="<?= TEMPLATE.DIR_GRAPHICS.FAVICON; ?>">
  <link href="<?= TEMPLATE.DIR_CSS.CSS_MAIN; ?>" type="text/css" rel="stylesheet">
 </head>

 <body>
  <!-- begin search form page -->
  <table cellspacing="0" cellpadding="0" border="0" summary="">
   <tbody>
    <tr>
     <td><b><?= $gui_search_form_header; ?></b></td>
    </tr>
    <tr>
     <td><?php d_s (1, 22); ?></td>
    </tr>
    <tr>
     <td>
      <table cellspacing="0" cellpadding="0" border="0" width="100%" summary="">
       <tbody>
        <tr>
         <td><?php d_s (10, 1); ?></td>
         <td>
          <form action="<?= FILENAME_SEARCH_SEND; ?>" name="search_form" method="post">
           <fieldset>
            <legend><?= $gui_search_form_legend; ?></legend>
            <table cellpadding="0" cellspacing="0" border="0" summary="">
             <tbody>
              <tr>
               <td><?= $gui_search_form_cat; ?></td>
               <td>
                <select name="cat_id" style="width: 270px">
                 <option value="all_cats"><?= $gui_search_form_to_all_cats; ?>
                 <?php
                  $options ='';
                  
                  $get_options = get_cat_selectlist (0, 0, 1);   
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
               <td><?= $gui_search_form_point; ?></td>
               <td>
                <select name="field_id" style="width: 270px">
                 <option value="con_base_title"><?= $gui_search_form_field_by_title; ?>
                 <option value="con_des_title"><?= $gui_search_form_field_by_des; ?>
                 <option value="con_text"><?= $gui_search_form_field_by_text; ?>
                </select>
               </td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s (1, 4); ?></td>
              </tr>
              <tr>
               <td><?= $gui_search_form_keyword; ?></td>
               <td><?php input_text ('keyword', 'width: 270px', ''); ?></td>
              </tr>
              <tr>
               <td colspan="2"><?php d_s (1, 6); ?></td>
              </tr>
              <tr>
               <td><?php d_s (); ?></td>
               <td align="center">
                <?php
                 input_button ('image', 'submit', TEMPLATE.DIR_GRAPHICS."submit.png");
                 echo d_s (10, 1);
                 echo '<a href="'.FILENAME_SEARCH_FORM.'"><img src="'.TEMPLATE.DIR_GRAPHICS."clear.png".'" border="0" alt=""></a>';
                ?>
               </td>
              </tr>
             </tbody>
            </table>
           </fieldset>

           <input type="hidden" name="submit_check" value="1"> 
          </form>
         </td>
         <td><?php d_s (10, 1); ?></td>
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
  <!-- end search form page -->
 </body>

</html>
