<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
   "http://www.w3.org/TR/html4/frameset.dtd">

<!--
 Copyright (c) 2007 Efstathios Chatzikyriakidis (contact@efxa.org)

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

 // init it first.
 $site = '';

 foreach ($_GET as $key => $value)
 { 
  $site .= $key."=".$value."&";
 }

 $site = substr ($site, 4, -1);
?>

<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title><?= $gui_welcome_title; ?></title>
  <link rel="stylesheet" href="style.css" type="text/css">
 </head>
 <frameset rows="32, *">
  <frame marginheight="0" marginwidth="0" src="top.php?out=<?= $site; ?>" scrolling="no" noresize name="top" frameborder="0">
  <frame marginheight="0" marginwidth="0" src="<?= $site; ?>" scrolling="auto" noresize name="main" frameborder="0">
  <noframes>
   <p>The current web broswer does not support frames.</p>
  </noframes>
 </frameset>
</html>
