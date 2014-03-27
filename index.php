<?php
/**
*Index
*/
require_once("class/panier.inc.php");
require_once("class/produit.inc.php");
require_once("class/categorie.inc.php");
include("util/fonctions.php");

session_start();
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;

if(!isset($_REQUEST['uc']))
{
/**
	*verification des donnees
	*/
     $uc = 'accueil';
}
else
{
/**
	*verification des donnees
	*/
	 $uc = $_REQUEST['uc'];
}	 
switch($uc)
{
/**
	 *On choisit quel vu on va utiliser
	 *
	 */
	case 'accueil': 
					include("vues/v_accueil.php");
					break;
	case 'voirProduits' :
					include("c_voirProduits.php");
					break;
	case 'gererPanier' :
					include("c_gestionPanier.php");
					break; 
	case 'administrer' :
					include("c_gestionProduits.php");
					break; 
}
include("vues/v_pied.php") ;
?>

