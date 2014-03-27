<div id="produits">
<?php
echo "<table>";
foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit->getId();
	$description = $unProduit->getDescription();
	$image = $unProduit->getImage();
	$prix = $unProduit->getPrix();
	$urlsup = 'index.php?uc=administrer&idCategorie='.$idCategorie.'&idProduit='.$id.'&action=supprimerProduit';
	$urlmodif = 'index.php?uc=administrer&idCategorie='.$idCategorie.'&idProduit='.$id.'&action=modifierProduit';

	echo "<tr>
			<td width=150><img src='$image' alt=image width=100	height=100 /></td>
			<td width=100>$description</td>
			<td width=100>$prix</td>

			<form method='POST' action='".$urlmodif."'>
			<td width=900><input type='submit' value='modifier'/></td>
			</form>

			<form method='POST' action='".$urlsup."'>
			<td width=900><input type='submit' value='supprimer'/></td>
			</tr>
			</form>
			";
	
}
$url = 'index.php?uc=administrer&action=ajoutProduit&idCategorie='.$idCategorie;
echo "<form method='POST' action='".$url."'><input type='submit' value='Ajouter un produit' size='10'/></form>";
?>
</table>
</div>
