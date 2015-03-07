<?php

 /*
  *  Copyright (c) 2006 Efstathios Chatzikyriakidis (contact@efxa.org)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  */

 // the following function gets
 // string and transforms it to
 // png image.
 function string2image ($str, $font = 2)
 {
  // calculate the image size from the string and font.
  $width  = 2 + strlen ($str) * imagefontwidth ($font);
  $height = 2 + imagefontheight ($font);

  // create the image.
  $im = @imagecreate ($width, $height);

  // set up the background and text color.
  $white  = imagecolorallocate ($im, 255, 255, 255);
  $orange = imagecolorallocate ($im, 192, 113, 17);

  // now the image must be transparent.
  imagecolortransparent ($im, $white);

  // write the text to the image.
  @imagestring ($im, $font, 1, 1, $str, $orange);

  // return the image.
  return $im;
 }

 // output the image as a PNG file.
 print header ("Content-type: image/png");

 // get the string.
 imagepng (string2image ($_GET['string']));
?>
