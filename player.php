<?
define('FIGURE_LENGTH', 3);

class player
{
	
	
	
	protected $number;	//最初に設定する数列
	protected $history;	//履歴の配列
	
	public function setNumber($inputNumber){
		
		for($i = 0; $i < FIGURE_LENGTH; $i++){
			
			$this->number[] = ($inputNumber % 10);
			$inputNumber /= 10;
		
		}
		
		for($i = 0; $i < FIGURE_LENGTH / 2; $i++){
		
			$temp = $this->number[$i];
			$this->number[$i] = $this->number[FIGURE_LENGTH - 1 - $i];
			$this->number[FIGURE_LENGTH - 1 - $i] = $temp;
			
		}
		
	}
	
	public function getNumber(){
		
		return $this->number;
		
	}
	
	public function addHistory($history){
	
		$this->history[] = $history;
	
	}
	
	public function getHistory(){
	
		return $this->history;
	
	}

} 

//以下、テストコード
$player1 = new player();
$player2 = new player();

$player1->setNumber(192);
$player2->setNumber(168);

$player1->addHistory('108 2EAT 0BITE');
$player2->addHistory('921 0EAT 3BITE');

var_dump($player1->getNumber());
var_dump($player2->getNumber());
var_dump($player1->getHistory());
var_dump($player2->getHistory());