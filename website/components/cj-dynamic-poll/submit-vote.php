<?php

 /*
  *  Copyright (c) 2007 CJ Website Design (webmaster@cj-design.com)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 function submitVote ($vote)
 {
  global $pollfile;
  global $ipfile;

  $uip = $_SERVER['REMOTE_ADDR'];

  include ($pollfile);

  $ip       = fopen ($ipfile, "r");
  $contents = fread ($ip, filesize ($ipfile));

  if (stristr ($contents, $uip) !== false)
  {
   echo $GLOBALS['you_have_already_vote']."<br><br>";
  }
  else
  {
   $ip  = fopen ($ipfile, "a");

   fputs  ($ip, "<? //$uip ?>\n");
   fclose ($ip);

   $file = fopen ($pollfile, "w+");

   fputs ($file, "<?\n");
   fputs ($file, "\$a[0] = \"$a[0]\";\n");
   fputs ($file, "\$a[1] = \"$a[1]\";\n");
   fputs ($file, "\$a[2] = \"$a[2]\";\n");
   fputs ($file, "\$a[3] = \"$a[3]\";\n");
   fputs ($file, "\$a[4] = \"$a[4]\";\n");
   fputs ($file, "\$a[5] = \"$a[5]\";\n");
   fputs ($file, "\$a[6] = \"$a[6]\";\n");
   fputs ($file, "\$a[7] = \"$a[7]\";\n");
   fputs ($file, "\$a[8] = \"$a[8]\";\n");
   fputs ($file, "\$a[9] = \"$a[9]\";\n\n");

   if ($vote == $a[0])
   { 
    $in = $v[0] + 1; 
    fputs ($file, "\$v[0] = \"$in\";\n");
   }
   else
   { 
    fputs ($file, "\$v[0] = \"$v[0]\";\n");
   }

   if ($vote == $a[1]) { $in = $v[1] + 1; fputs ($file, "\$v[1] = \"$in\";\n"); } else { fputs ($file, "\$v[1] = \"$v[1]\";\n"); }
   if ($vote == $a[2]) { $in = $v[2] + 1; fputs ($file, "\$v[2] = \"$in\";\n"); } else { fputs ($file, "\$v[2] = \"$v[2]\";\n"); }
   if ($vote == $a[3]) { $in = $v[3] + 1; fputs ($file, "\$v[3] = \"$in\";\n"); } else { fputs ($file, "\$v[3] = \"$v[3]\";\n"); }
   if ($vote == $a[4]) { $in = $v[4] + 1; fputs ($file, "\$v[4] = \"$in\";\n"); } else { fputs ($file, "\$v[4] = \"$v[4]\";\n"); }
   if ($vote == $a[5]) { $in = $v[5] + 1; fputs ($file, "\$v[5] = \"$in\";\n"); } else { fputs ($file, "\$v[5] = \"$v[5]\";\n"); }
   if ($vote == $a[6]) { $in = $v[6] + 1; fputs ($file, "\$v[6] = \"$in\";\n"); } else { fputs ($file, "\$v[6] = \"$v[6]\";\n"); }
   if ($vote == $a[7]) { $in = $v[7] + 1; fputs ($file, "\$v[7] = \"$in\";\n"); } else { fputs ($file, "\$v[7] = \"$v[7]\";\n"); }
   if ($vote == $a[8]) { $in = $v[8] + 1; fputs ($file, "\$v[8] = \"$in\";\n"); } else { fputs ($file, "\$v[8] = \"$v[8]\";\n"); }
   if ($vote == $a[9]) { $in = $v[9] + 1; fputs ($file, "\$v[9] = \"$in\";\n"); } else { fputs ($file, "\$v[9] = \"$v[9]\";\n"); }

   $newtotal = $total + 1;

   fputs ($file, "\$total = \"$newtotal\";\n");
   fputs ($file, "\$ask = \"$ask\";\n");
   fputs ($file, "?>");

   fclose ($file);

   echo "<script language=\"javascript\">window.location=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&voted=true\";</script>\n<noscript><a href=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."\">Συνέχεια...</a></noscript>";
  }
 }
?>