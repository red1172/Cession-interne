﻿
<?php

$pos=$_GET['pos'];		

function ssh($host, $login, $mdp, $command)
{
    if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");
    if(!($con = ssh2_connect($host, 22))){
       echo "echec connexion\n";
    } else {
        if(!ssh2_auth_password($con, $login, $mdp)) {
            echo "echec authentification\n";
        } else {
            // execute a command
            if (!($stream = ssh2_exec($con, $command ))) {
                echo "echec de lexion de la commande\n";
            } else {
                // collect returning data from command
                //echo "111";
		//print_r($stream);
		stream_set_blocking($stream, true);
                $data = "";
                while ($buf = fread($stream,4096)) {
                    $data .= $buf;
                }
               //echo $data; 
		fclose($stream);
                return $data;
            }
        }
    }

}

$command = "/home/tplinux/usr/bin/wol --host 10.14.0.14 --port 7 xx: xx: xx: xx: xx"";
$ret = ssh('10.20.3.20', 'tux', 'tux', $command);
echo '<center><pre>' . $ret . '</pre></center>';
echo '<br /><center><font color="#ff0000">La caisse N° : </font><b>'.$pos.'</b><font color="#ff0000"> a était restauré avec succès.</font></center>'
?>

<meta http-equiv="refresh" content="5; url=restart.php"/> 



