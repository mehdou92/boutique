<?php
$action = $_REQUEST['action'];
switch($action)
{
case 'connexion':
	$nom='';
	$mdp='';
	include("vues/v_connexion.php");	
	break;

case 'verifconnexion':
	$nom= $_REQUEST['nom'];
	$mdp= $_REQUEST['mdp'];
	$msgErreurs = getErreursConnexion($nom,$mdp);
	if(count($msgErreurs)!=0){
		include ("vues/v_connexion.php");
		include ("vues/v_erreurs.php");
	}
	else {
		$lesCategories = getLesCategories();
		include("vues/v_categorieAdmin.php");
	}
	break;

case 'voirProduits' :
		$lesCategories = getLesCategories();
		include("vues/v_categorieAdmin.php");
  		$idCategorie = $_REQUEST['idCategorie'];
		$lesProduits = getLesProduits($idCategorie);
		include("vues/v_produitsAdmin.php");
		break;
		
case 'ajoutProduit' :
		$description='';
		$image='';
		$prix='';
		$idCategorie = $_REQUEST['idCategorie'];
		
		include("vues/v_ajoutProduitAdmin.php");
		break;

case 'ajoutProduitAdmin' : //verification de l'ajout 

   		$file=$_FILES["mon_fichier"];	
		$description = $_REQUEST['description'];
		$prix = $_REQUEST['prix'];
		ajouterProduit($description, $file, $prix, $_REQUEST['idCategorie']);
		$erreurConnexion = getErreursCreation($description,$prix,$file);

		if(count($erreurConnexion)!=0){

			include("vues/v_ajoutProduitAdmin.php");
			include("vues/v_erreurs.php");
		}

		
		break;

case 'supprimerProduit':
		$idProduit=$_REQUEST['idProduit'];
		//echo $idProduit;
		supprimerProduit($idProduit);
		$lesCategories = getLesCategories();
		include("vues/v_categorieAdmin.php");
  		$idCategorie = $_REQUEST['idCategorie'];
		$lesProduits = getLesProduits($idCategorie);
		include("vues/v_produitsAdmin.php");
		break;

case 'modifierProduit':
		
		$idCategorie = $_REQUEST['idCategorie'];
		$idProduit = $_REQUEST['idProduit'];
		$produit= getProduit($idProduit);
		include("vues/v_modifierProduit.php");
		break;

case 'verifModifierProduit':

		$description = $_REQUEST['description'];
		$image = $_REQUEST['image'];
		$prix = $_REQUEST['prix'];
		$idProduit = $_REQUEST['idProduit'];
		
		$erreurConnexion = getErreursCreation($description, $image, $prix);

		if(count($erreurConnexion)!=0){

			include("vues/v_modifierProduit.php");
			include("vues/v_erreurs.php");
		}
		else 
			modifierProduit($description, $image, $prix, $idProduit);
		break;



}
?>