<?php




/**
 * 
 * @author Julien
 * @version 0.1
 * 
 * Classe qui g�re les tours par tours dans les jeux
 * tels que Tic Tac Toe, Echecs...
 * 
 * Se r�f�re aux Slot::slot_position.
 * 
 * Vocabulaire :
 * 	tour : incr�ment� quand chaque joueur a jou� un tour
 * 	coup : correspond au slot_position
 * 
 * 
 * G�re :
 * 	- Jouer quand c'est son tour seulement
 * 	- Compte le nombre de coup
 *  - G�re les timeout des joueurs pour chaque tour
 *
 */
class Tours {
	public static $ALEATOIRE=0;
	
	public $tour;
	public $coup;
	
	/**
	 * 
	 * Rotation des joueurs
	 * @var int $rotation 1 si normal, -1 si invers�
	 */
	public $rotation=1;
	
	
	/**
	 * 
	 * Constructeur
	 * @param int $first_player (default = 1, premier joueur)
	 * 		ALEATOIRE : le premier joueur est al�atoire
	 * 		int : num�ro du slot qui commence.
	 */
	public function __construct($first_player=1) {
		$this->tour=1;
		
		if($first_player>0) {
			$this->coup=$first_player;
		} else {
			$this->coup=rand(1, partie()->getNbJoueur());
		}
	}
	
	
	public function next() {
		if($this->rotation==0) {
			throw new Exception('rotation est nulle');
		}
		
		$nbj=partie()->getNbJoueur();
		
		
		$this->coup+=$this->rotation;
		
		
		while($this->coup > $nbj) {
			$this->tour++;
			$this->coup-=$nbj;
		}
		while($this->coup < 1) {
			$this->tour++;
			$this->coup+=$nbj;
		}
		
	}
	
	
	
	public function getTour() {
		return $this->tour;
	}
	public function getCoup() {
		return $this->coup;
	}
	
	
	public function aMoiDeJouer() {
		return slot()->position == $this->coup;
	}
	public function pasAMoiDeJouer() {
		return slot()->position != $this->coup;
	}
	
	
	
	public static function createFrom($o) {
		$ret=new Tours();
		foreach($o as $key=>$value) {
			$ret->$key=$value;
		}
		
		return $ret;
	}
	
	
}








