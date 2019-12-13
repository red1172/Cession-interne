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

$command = "reboot";
$ret = ssh('10.15.0.'.$pos.'', 'root', 'xxxxxx', $command);
echo '<center><pre>' . $ret . '</pre></center>';
$cpos=$pos-100;
echo '<br /><center><font color="#ff0000">La caisse N° : </font><b>'.$cpos.'</b><font color="#ff0000"> a était rebooté avec succès.</font></center>'

?>
<meta http-equiv="refresh" content="5; url=reboot.php"/> 

