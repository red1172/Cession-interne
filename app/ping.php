<?php

function mini_ping($host='10.14.0.22', $timeout=1)
{
  // vérifier paramètre
  $timeout=(int)$timeout;
  if($timeout==0) $timeout=1;
  // detecter si serveur sous unix
  if($_SERVER['SCRIPT_FILENAME'][0]=="/" )
    exec('ping -c1 -w'.escapeshellarg($timeout).' '.escapeshellarg($host) , $out, $ret);
  else // ou windows
    exec('ping -n 1 -w '.escapeshellarg($timeout).' '.escapeshellarg($host) , $out, $ret);
  return $ret==0;
}
// rediriger le navigateur suivant le résultat du ping
if(mini_ping($_GET['host'], $_GET['timeout']))
  header("Location: ".$_GET['www.google.com']);
else
  header("Location: ".$_GET['www.yahoo.fr']);
?>

