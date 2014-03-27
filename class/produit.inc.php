<?PHP
/**
	*creation de la classe Produit
	*/
class Produit {
	private $id;
	private $description;
	private $image;
	private $prix;

	/**
	*constructeur
	*/
	function __construct($unId, $uneDescription, $uneImage, $unPrix){
		$this->id = $unId;
		$this->description = $uneDescription;
		$this->image =$uneImage;
		$this->prix = $unPrix;
		$this->quantite = 0;
	}

	
	/**
	*accesseur
	*/
	public function getId(){
		return $this->id ;
	}
	public function getDescription(){
		/**
	*accesseur
	*/
		return $this->description;
	}	
	public function getImage(){
		/**
	*accesseur
	*/
		return $this->image ;
	}
	public function getPrix(){
		/**
	*accesseur
	*/
		return $this->prix;
	}
	public function getQuantite(){

		return $this->quantite;
	}
} // fin de la classe
?>