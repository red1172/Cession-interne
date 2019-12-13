<?
$date_hier = strftime("%d-%m-%Y", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); 
$fp = fopen("../var/www/html/monitor/test778.txt","a+"); //lecture et ecriture du fichier
$fp1 = fopen("test3.php","r"); //lecture du fichier
while (!feof($fp1)) { //on parcourt toutes les lignes
  $page .= fgets($fp1, 4096); // lecture du contenu de la ligne
}
fseek($fp, 0);
$titre = eregi("echo(.*);",$page,$regs); //on isole le contenu

fputs($fp, $regs[1]); // On écrit sur le fichier


fclose($fp);
fclose($fp1);


?>