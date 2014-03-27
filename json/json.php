<?php

 $hote="mysql.hostinger.fr";
 $login="u827436871_mehdi";
 $mdp="123456";
 $connexion= mysql_connect($hote, $login, $mdp);
 $bd="u827436871_bouti";
 $query="SET CHARACTER SET utf8";
 // Modification du jeu de caractères de la connexion
 mysql_query($query, $connexion);
 mysql_select_db($bd, $connexion) or die("erreur select db");

$req = "select idProduit, description, prix  from produit";
$sth = mysql_query($req);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $rows[] = $r;
}
//print json_encode($rows);

$fichierjson = fopen("test.json", "w");
$ligne = json_encode($rows);
fwrite($fichierjson,'{"LesProduit":'.$ligne.'}');
fclose($fichierjson);


echo "Fichier json correctement creer";



?>