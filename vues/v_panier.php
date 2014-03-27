<img src="images/panier.gif"	alt="Panier" title="panier"/>
<img src="images/panier.jpg"	alt="Panier" title="panier"/>
<?php
/**
*Affichage du contenu du panier
*/
$i = 0;
/**
*Affichage du contenu du panier
*/
foreach( $lesProduits as $unProduit) 
{

	$id = $unProduit->getId();
	$description = $unProduit->getDescription();
	$image = $unProduit->getImage();	
	$url ="<a href=index.php?uc=gererPanier&produit=$id&action=supprimerUnProduit>supprimer </a>";
	$quantite = getLesQuantitesDuPanier();
	$prix = $unProduit->getPrix();
	echo "<br>
			<tr><td><img src=".$image." alt=image width=100	height=100 /></td>
			<td>$description<br />
			$prix  €<br />
			$url<br />
			 quantité : $quantite[$i] </td></tr>
			";
			$i++;
/**
*Affichage du contenu du panier
*/
}
?>
<br>
<a href=index.php?uc=gererPanier&action=passerCommande>Passer la commande</a>
