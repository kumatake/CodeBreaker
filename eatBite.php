<?

class eatBite
{
	
	private $eat;
	private $bite;
	
	public function __construct(){
		
		$this->eat = 0;
		$this->bite = 0;
		
	}
	
	public function setEat($number){
	
		$this->eat = $number;
	
	}
	
	public function getEat(){
	
		return $this->eat;
	
	}
	
	public function setBite($number){
	
		$this->bite = $number;
		
	}
	
	public function getBite(){
	
		return $this->bite;
	
	}
	
}

// 以下、テストコード

/*$eb = new eatBite;

$eb->setEat(1);
$eb->setBite(2);

echo 'EAT:' . $eb->getEat() . ' BITE:' . $eb->getBite();
*/