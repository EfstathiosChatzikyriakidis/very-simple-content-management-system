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

 $path =  __FILE__;
 $path = preg_replace ("'\\\poll\.php'" , "" , $path);
 $path = preg_replace ("'/poll\.php'"   , "" , $path);
 include ($path."/poll-config.php");
 
 // create a directory object to the current directory
 $dir = dir ($path."/polldata");

 $polls  = array ();
 $ids    = array ();
 $delete = array ("poll-", ".txt");

 $i = 0;
 while ($dir_entry = $dir->read ())
 {
  if (strstr ($dir_entry, "poll"))
  {
   $polls[$i] = $dir_entry;
   $id = str_replace ($delete, "", $dir_entry);
   $ids[$i] = $id;
   $i++;
  }
 }

 if ($i == 0)
 {
  echo "<b>".$nopoll."</b><br><br>";
 }
 else
 {
  if ($random_display)
  {
   srand ((double)microtime()*1000000); 
   $pollid = rand (0,count ($polls)-1);
  }
  else
  {
   if (isset ($_GET['showpoll']))
   {
    $pollid = $_GET['showpoll'];
	if (empty ($polls[$pollid]))
	 $pollid = 0;
   }
   else
   {
    if (!isset ($_POST['pollid']))
     $pollid = 0;
	else
	 $pollid = intval ($_POST['pollid']);
   }
  }	

  $pollfile = $path."/polldata/".$polls[$pollid];
  $ipfile   = $path."/polldata/ips-".$ids[$pollid].".php";
  include ($pollfile);

  if (isset ($_POST['vote']))
  {
   include ("submit-vote.php");
   submitVote ($_POST['vote']);
  }
  else
  {
   // check that they have voted or not
   $ip = fopen ($ipfile, "r");
   $contents = fread ($ip, filesize ($ipfile));
   $uip = $_SERVER['REMOTE_ADDR'];

   // start html code returning results.	
   if (stristr ($contents, $uip) !== false)
   {  
    $ask = stripslashes ($ask);
    echo "<b>$ask</b><br>";

	if (isset ($_GET['voted']))
	 echo "<br>".$thank_you_for_voting."<br><br>";
    else
     echo "<br>".$voted_already."<br><br>";

    echo $total_string.$total." ";

    if ($total == "1")
	 echo $one_vote;
    else
     echo $many_votes;

    echo ".<br>";

    for ($i=0; $i < count ($a); $i++)
    {
	 $a[$i] = stripslashes ($a[$i]);

     if ($a[$i] != "" && $v[$i] != "")
     { 
      $percentage = (round (($v[$i] / $total) * 100, 1));
      echo "<br><b>$a[$i]</b>&nbsp;(<span id=\"ans_".$i."\" style=\"cursor:help;\" title=\"".$a[$i]." - ".$v[$i]." $many_votes (".$percentage."%)\">".$v[$i]."</span>)<br>\n";
      echo "<img alt=\"$a[$i] - $v[$i] $many_votes ($percentage%)\" style=\"cursor:help;\" src=\"graphics/polls-bar.png\" height=\"".$poll_bar_height."\" vspace=5 width=";
      echo (round(($v[$i] / $total) * 80, 0));
      echo ">";
     }
	} 

    echo "<br><br>";

    if (!$random_display)
     printNextPoll ($pollid);
   }
   else
   {
    $ask = stripslashes ($ask);
    echo "<b>$ask</b><br><br>\n\n";
    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."\">\n\n";
    echo "<table cellpadding=\"0\" cellspacing=\"0\" summary=\"\" border=\"0\">\n";

    for ($i=0; $i < count($a); $i++)
    {
	 $a[$i] = stripslashes ($a[$i]);
	 if($a[$i] != "")
	 {
	  echo "  <tr>\n";
	  echo "    <td>\n";
	  echo "      <input type=\"radio\" name=\"vote\" value=\"$a[$i]\">\n";
	  echo "    </td>\n";
      echo "    <td>&nbsp;";
	  echo "$a[$i]";
	  echo "</td>\n";
	  echo "  </tr>\n";
	 }
	}

	echo "</table>\n\n";
	echo "<input type=\"hidden\" name=\"pollid\" value=\"$pollid\">\n";
	echo "<input type=\"hidden\" name=\"pollpid\" value=\"$ids[$pollid]\">\n";
	echo "<br><input type=\"submit\" value=\"$vote_button_text\">\n";
	echo "</form>\n\n";

	if (!$random_display)
	 printNextPoll ($pollid);
   }
  }
 }

 function printNextPoll ($pollid)
 {
  global $path;

  $nextpoll = $pollid + 1;
  $prevpoll = $pollid - 1;
  $dir      = dir ($path."/polldata"); // create a directory object to the current directory
  $polls    = array ();

  $i = 0;
  while ($dir_entry = $dir->read ())
  {
   if (strstr ($dir_entry, "poll"))
   {
    $polls[$i] = $dir_entry;
    $i++;
   }
  }
  
  if (!empty ($polls[$prevpoll])) echo "<a href=\"".$_SERVER['PHP_SELF']."?showpoll=$prevpoll\"><< Προηγούμενη</a>&nbsp;&nbsp;";
  if (!empty ($polls[$nextpoll])) echo "<a href=\"".$_SERVER['PHP_SELF']."?showpoll=$nextpoll\">Επόμενη >></a>";
}
?>
