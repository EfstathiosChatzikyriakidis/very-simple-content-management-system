<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<!--
 Copyright (c) 2007 Efstathios Chatzikyriakidis (stathis.chatzikyriakidis@gmail.com)

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

 // get the url of the website.
 $website_address = "http://".$conf_http_host;

 // init it first.
 $site = '';

 foreach ($_GET as $key => $value)
 { 
  $site .= $key."=".$value."&";
 }

 $site   = substr ($site, 4, -1);
 $delete = array ("http://", "ftp://", "www.");
 $show   = str_replace ($delete, "", $site);

 if (strlen ($show) > 40)
 {
  $show = substr_replace ($show, '...', 40);
 }
?>

<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title><?= $gui_welcome_title; ?></title>
  <link rel="stylesheet" href="style.css" type="text/css">
 </head>
 <body>
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
   <tbody valign="middle">
    <tr>
     <td height="7" bgcolor="#ffffff"></td>
    </tr>
    <tr>
     <td>
      <table border="0" cellspacing="0" cellpadding="0" style="height: 25px">
       <tbody valign="middle" bgcolor="#FDFFCB">
        <tr>
         <td width="1">
          <a href="<?= $site; ?>" target="_top"><img src="close.png" border="0" hspace="5"></a>
         </td>
         <td width="1" nowrap>
          <b><?= ucfirst ($show); ?></b>
         </td>
         <td width="100%" align="right" nowrap>
          <a href="<?= $website_address; ?>" target="_top"><?= $gui_welcome_title; ?></a>&nbsp;&nbsp;
         </td>
        </tr>
       </tbody>
      </table>
     </td>
    </tr>
   </tbody>
  </table>
 </body>
</html>
