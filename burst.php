#!/usr/local/bin/php

<?php

include_once  "inc/common.php";
include_once  "inc/welcome.php";
include_once  "inc/help.php";
include_once  "inc/curl.php";

welcome();

$prompt = "burst>";
echo $prompt;

//while ($f = trim(fgets(STDIN)) && $f) {
while ($f = trim(readline(' '))) {
   $f = str_replace(PHP_EOL, '', $f);
   //echo "line: $f\n";

   if ($f == "quit;") {
      break;
   }
   else if ($f == "help;") {
      help();
   }
   // starts with at<space>
   else if (strpos($f, "at ") === 0) {
      $temp = explode(" ", $f);
      if (count($temp) >= 2) {
          $acc = $temp[1];
          $acc = str_replace(";","",$acc);
          $arr = url_get_at($acc);
          echo AT_details($arr);
          echo "\n\n";
      }
   }
   else if ($f == "ats all;") {
      $arr = url_get_ats();
      $cnt = count($arr);
      //pretty_print_r($arr);
      echo implode(" ",$arr);
      echo "\n\nFound a total of : $cnt smartcontracts!\n\n";
   }
   else  {
      echo  "** Unknown command, try ';' at end or 'help;' \n\n";
   }
   echo $prompt;
}

echo "\n";
echo "\n";



?>
