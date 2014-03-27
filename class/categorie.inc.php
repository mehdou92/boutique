<?PHP
class Categorie {
	private $id;
	private $libelle;	
		/**
	*constructeur
	*/
	function __construct($unId, $unLibelle){ 

		$this->id = $unId;
		$this->libelle = $unLibelle;
	}
		/**
	*accesseur
	*/
	public function getId(){

		return $this->id ;
	}
		/**
	*acceseur obtenir libelle
	*/
	public function getLibelle(){

		return $this->libelle;
	}	
} 
?>