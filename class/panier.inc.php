<?PHP
class Panier 
{
    private $panier;


	function __construct()
	{ 	
	/** 
	* constructeur
	*
	*/
		$this->panier = array();
	}
	// ajouter un article 
	public function ajoutItem($refProduit,$nb) 
	{
	/**
		*ajouter un article
		*
		*/
	if (isset($this->panier[$refProduit])) 
		$this->panier[$refProduit] += $nb;
	else
		$this->panier[$refProduit] = $nb;
	}	
	
	public function suppressionItem($refProduit,$nb) 
	{
	/**
	*
	* supprimer un article 
	*/
		$this->panier[$refProduit] -= $nb;
		if ($this->panier[$refProduit] <= 0) 
			unset ($this->panier[$refProduit]);
	}			
	public function recupPanier()
	{
	/**
	*
	*renvoit les références et les quantites
	*/
		return $this->panier;
	}
} // fin de la classe
?>