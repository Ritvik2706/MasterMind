<?php
require "MasterMindClass.php";

function verifierProp($prop,$game) { 
  $code = $game->getCode();
  $charProp = str_split($prop);
  $valid_chars=['0','1','2','3','4','5','6','7','8','9'];
  $correctPos=0;
  $wrongPos=0;
  $i=0; 
  if (count($code)!=count($charProp) || count($charProp) !== count(array_unique($charProp))) return 0;
  foreach ($charProp as $c) {
    if (!in_array($c,$valid_chars)) return 0;
    if (in_array($c,$code)) {
      if ($code[$i]==(int) $c) $correctPos++;
      else $wrongPos++;
    }
    $i++;
  }
  if ($correctPos==count($code)) {
    return 1;
  }
  return [$correctPos,$wrongPos]; 
}


?>
