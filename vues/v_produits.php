<div id="produits">
<?php
echo "<table>";
foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit->getId();
	$description = $unProduit->getDescription();
	$image = $unProduit->getImage();
	$prix = $unProduit->getPrix();
	$url = 'index.php?uc=voirProduits&idCategorie='.$idCategorie.'&produit='.$id.'&action=voirProduitsEtAjouterAuPanier';
    echo "<form method='POST' action='$url'>";
	echo "<tr>
			<td width=150><img src='$image' alt=image width=100	height=100 /></td>
			<td width=100>$description</td>
			<td width=100>$prix</td>
			<td width=300> Quantite :<input type='text' name='quantite' value ='1' size='2' /> 
			<input type='submit' value='Commander'  /></td>";
	echo "</form>";
}
?>
</table>
</div>

</div>
