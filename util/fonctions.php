<?php

function connexion()
{
/**
*Fonction de connexion à la bdd
*/
   $hote="mysql.hostinger.fr";
   $login="u827436871_mehdi";
   $mdp="123456";
   $connexion= mysql_connect($hote, $login, $mdp);
   $bd="u827436871_bouti";
   $query="SET CHARACTER SET utf8";
   // Modification du jeu de caractères de la connexion
   mysql_query($query, $connexion);
   mysql_select_db($bd, $connexion) or die("erreur select db");
   return $connexion;
}
function connexionAdmin($nom, $mdp)
{
	$connexion = connexion();
	$retour = false;
	$req = "select * from administrateur where nom='$nom' AND mdp='$mdp'";
	$connexion1 = mysql_query($req,$connexion);
	$connexion2 = mysql_fetch_array($connexion1);

	if($connexion2){
		$_SESSION['admin']= $connexion2['nom'];
		$retour = true;
	}
	mysql_close();
	return $retour;
}

function getLesCategories()
{
/**
*Obtenir l'ensemble des categories
*/
	$connexion = connexion();
	$req="select * from categorie";
   	$rsCategorie = mysql_query($req, $connexion);
   	$lgCategorie = mysql_fetch_array($rsCategorie);
   	$lesCategories=array();
	// Boucle sur les catégories
  	while ($lgCategorie != FALSE)
   	{ $idCategorie = $lgCategorie["idCategorie"];
	  $categorie = new Categorie($idCategorie,$lgCategorie["libelle"]);
      $lesCategories[$idCategorie]=$categorie;
	  $lgCategorie = mysql_fetch_array($rsCategorie);
   	}
	mysql_close();
	return $lesCategories;
}

function getErreursConnexion($nom,$mdp)
/**
*Obtenir les erreurs de connexion
*/
{
 $lesErreurs = array();
 if(!estNomVide($nom))
 	$lesErreurs[]= "erreur de nom";
 if(!estNomVide($mdp))
 	$lesErreurs[]= "erreur Mot de passe";
 $ret = connexionAdmin($nom,$mdp);
 if($ret!=true)
	$lesErreurs[]= "Erreur de mot de passe ou de Login";
 return $lesErreurs;
}

function estNomVide($donnée)
{
return (strlen ($donnée)!= 0);
}

function estAdmin($nom, $mdp)

{
 $connexion = connexion();

 $nom=$_REQUEST['nom'];
 $mdp=$_REQUEST['mdp'];

}

 function getLesProduits($uneCategorie)
{
/**
*Fonction permettant d'obtenir la liste des produits
*/
	$connexion = connexion();
	$req="select * from produit where idCategorie = '$uneCategorie'";
	//echo $req;
   	$rsProduit = mysql_query($req, $connexion);
    $lgProduit = mysql_fetch_array($rsProduit);
   	$lesProduits = array();
   	while ($lgProduit != FALSE)
   	{
    	$produit = new Produit($lgProduit["idProduit"],$lgProduit["description"],$lgProduit["image"], $lgProduit["prix"]);	
		$lesProduits[$lgProduit["idProduit"]]=$produit;		
		$lgProduit = mysql_fetch_array($rsProduit);
 	}
	mysql_close();
	return $lesProduits;
}
function getProduit($unId)
{
/**
*Fonction qui permet d'obtenir un produit à l'aide de son id
*/
	$connexion = connexion();
	$req="select * from produit where idProduit = '$unId'";
	//echo $req;
   	$rsProduit = mysql_query($req, $connexion);
    $lgProduit = mysql_fetch_array($rsProduit);
	$produit = null;
   	if ($lgProduit != FALSE)
   	{
    	$produit = new Produit($lgProduit["idProduit"],$lgProduit["description"],$lgProduit["image"], $lgProduit["prix"]);	
	}
	mysql_close();
	return $produit;
}
function initPanier()
{
/**
*Fonction qui permet d'initialiser le panier
*/
	if(!isset($_SESSION['panier']))
		$_SESSION['panier']= new Panier();
}
function ajouterAuPanier($idProduit, $quantite)
{	
/**
*Fonction qui permet de rajouter un article au panier
*/
	$_SESSION['panier']->ajoutItem($idProduit,$quantite);	
}

function ajouterProduit($description, $file, $prix, $idCategorie)
{

/** Fonction qui permet d'ajouter un article */
	$connexion=connexion();
	$categ='';
	if($idCategorie=='cap'){
		$categ="Capteur";
	}
	elseif ($idCategorie=='bra') {
		$categ="Bracelet";
	}

	elseif ($idCategorie=='mon') {
		$categ="Montre";
	}
	if(preg_match("/jpeg/",$file["type"]))
		{
			$file_def="images".'/'.$categ.'/'.$file["name"];
			copy($file['tmp_name'],$file_def);
			echo"Fichier uploadé dans : " .$file_def;		
		}

		

		else 

				echo"fichier non jpg !";
	$req="insert into produit values  ('','$description', '$prix', '$file_def', '$idCategorie')";
	if(mysql_query($req))
		echo "requete bien execute";
	else
		echo "echecs de la requete";
	



}
function modifierProduit($description, $image, $prix, $idProduit)
{

/** Fonction qui permet de modifer un article */
	$connexion=connexion();
	$req="update produit set description='$description', image='$image', prix='$prix' where idProduit='$idProduit' ";
	if(mysql_query($req))
		echo "requete bien execute";
	else
		echo "echecs de la requete";
		//echo $req;
}

function supprimerProduit($idProduit){
	$connexion = connexion ();
	$req="Delete from produit where idProduit = $idProduit";
	$rsCategorie = mysql_query($req, $connexion);
}
function getErreursCreation($description,$prix,$file)
/**
*Obtenir les erreurs de connexion
*/
{
 $lesErreurs = array();
 if(strlen ($description)==0)
 	$lesErreurs[]= "erreur de nom";
 if(strlen ($prix)==0)
 	$lesErreurs[]= "erreur de prix";
 return $lesErreurs;
}


function getErreursModification($description, $prix)
/**
*Obtenir les erreurs de connexion
*/
{
	$lesErreurs = array();
	if(strlen ($descritpion)==0)
		$lesErreurs[]= "erreur de nom";
	if(strlen ($prix)==0)
 	$lesErreurs[]= "erreur de prix";
 return $lesErreurs;
}
function retirerDuPanier($idProduit, $quantite)
{
/**
*Fonction qui permet de retirer un ou plusieurs articles du panier
*/
	$_SESSION['panier']->suppressionItem($idProduit, $quantite);
}
function getLesProduitsDuPanier()
{
/**
*Fonction qui permet d'obtenir les produits du panier
*/
	$lesProduits = array();
	if (isset($_SESSION["panier"])){		
		$panier = $_SESSION["panier"]->recupPanier();		
		foreach($panier as $id => $qte)
		{
				$produit = getProduit($id);
				$lesProduits[]=$produit;
		}		
	}
	return $lesProduits;
}
function getLesQuantitesDuPanier()
{	
/**
*Fonction qui permet d'obtenir les quantités présente du panier
*/
	$lesQuantites = array();
	if (isset($_SESSION["panier"])){	
		$panier = $_SESSION["panier"]->recupPanier();	
		foreach($panier as $id => $qte)
		{
				$lesQuantites[]=$qte;
		}				
	}
	return $lesQuantites;		
}
function creerCommande($nom,$rue,$cp,$ville,$mail )
{
/**
*Fonction qui permet de créer une commande
*/
	$connexion = connexion();
	$req="select max(idCommande) as maxi from commande";
   	$rsCategorie = mysql_query($req, $connexion);
   	$lgCategorie = mysql_fetch_array($rsCategorie);
   	$idCommande = $lgCategorie['maxi'];
   	$idCommande++;
	$date=date("Y-m-j");
   	$req = "insert into commande values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail')";
   	$rsCommande = mysql_query($req, $connexion);
   	$panier = $_SESSION['panier']->recupPanier();
	foreach($panier as $id=>$qte)
	{
		$req = "insert into contenir values ('$idCommande','$id',$qte)";
		$rsCategorie = mysql_query($req, $connexion);	
	}
	
	mysql_close();
	session_destroy();
}
function estUnCp($codePostal)
{
/**
*Fonction qui permet de vérifier un code postal
*/
   // Le code postal doit comporter 5 chiffres
   return strlen($codePostal)== 5 && estEntier($codePostal);
}

// Si la valeur transmise ne contient pas d'autres caractères que des chiffres,
// la fonction retourne vrai
function estEntier($valeur)
{
/**
*Fonction qui permet de vérifier un entier
*/
   return !preg_match ("/^[^0-9]./", $valeur);
}

function estUnMail($mail)
{
/**
*Fonction qui permet de vérifier que le mail est bon
*/
$regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
return preg_match ($regexp, $mail);
}

function estUnPrix($valeur)
{

	return preg_match ("/^(-)?[0-9]+([.][0-9]+)?$/", $valeur);
}



function estUneDescriptionVide($donnéeDescription)
{
	return (strlen ($donnéeDescription)!= 0);
}

function estUnFichierJpg($image)
{
	$retour = true;
	if ($image["error"])
		$retour= false;

	else 
		if (!preg_match("/jpeg/",$file["type"]))
			$retour = false;

		return $retour;

} 

function getErreursSaisieCommande($cp,$mail)
{
/**
*Fonction qui permet de vérifier la saisie des commandes
*/
 $lesErreurs = array();
 if(!estUnCp($cp))
 	$lesErreurs[]= "erreur de code postal";
 if(!estUnMail($mail))
 	$lesErreurs[]= "erreur de mail";
 return $lesErreurs;
}


?>
