<?php

initPanier();
	/**
	*Choix de l'action sur le produit
	*/
$action = $_REQUEST['action'];
	/**
	*Choix de l'action sur le produit
	*/
switch($action)
{

	case 'voirCategories':
  		$lesCategories = getLesCategories();
		include("vues/v_categories.php");
  		break;
  		
	case 'voirProduits' :
		$lesCategories = getLesCategories();
		include("vues/v_categories.php");
  		$idCategorie = $_REQUEST['idCategorie'];
		$lesProduits = getLesProduits($idCategorie);
		include("vues/v_produits.php");
		break;

	case 'voirProduitsEtAjouterAuPanier' :
		$lesCategories = getLesCategories();
		include("vues/v_categories.php");
  		$idCategorie = $_REQUEST['idCategorie'];
		$lesProduits = getLesProduits($idCategorie);
		include("vues/v_produits.php");
		$idProduit=$_REQUEST['produit'];
		$quantite=$_REQUEST['quantite'];
	  	ajouterAuPanier($idProduit, $quantite);
		break;
}
?>

