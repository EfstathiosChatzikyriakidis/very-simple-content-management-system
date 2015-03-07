<?php

 /*
  *  Copyright (c) 2007 Efstathios Chatzikyriakidis (contact@efxa.org)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 // start a session because we
 // need it, for many reasons.
 session_start ();

 // import selected size into session.
 $_SESSION['text_size'] = $_GET['size'];

 // redirects the browser back to
 // the page from where it came.
 header ("Location: ".$_SERVER['HTTP_REFERER']);

 // this code (comment) will never reached.
?>
