<?php

 // the following function is a gtrm client and
 // gets a holy sentence from a gtrm server app.

 // `gtrm' : `GNU terminal random message'.

 /*
  *  Copyright (c) 2006 Efstathios Chatzikyriakidis (stathis.chatzikyriakidis@gmail.com)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 function get_holy_sentence ($host, $port)
 {
  // attempting now to connect to
  // host `$host' on port `$port'.
  $fp = @fsockopen ($host, $port);
  if (!$fp)
  {
   echo "*** get_holy_sentence(). ".$GLOBALS['gui_gtrm_client_error'];
   return false;
  }

  // get a holy sentence.
  $sentence = fread ($fp, MAX_LINE);

  // closing socket file pointer.
  fclose ($fp);

  // return either the holy sentence or the error message.
  return empty ($sentence) ? "*** get_holy_sentence(). ".$GLOBALS['gui_gtrm_server_error'] : $sentence;
 }
?>
