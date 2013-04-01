<?
define('FIGURE_LENGTH', 3);

class player
{
	
	
	
	protected $number;	//最初に設定する数列
	protected $history;	//履歴の配列
	
	// 引数の数値を一つずつ配列に入れるメソッド
	public function setNumber($inputNumber){
		
		
		// 数値を分ける
		for($i = 0; $i < FIGURE_LENGTH; $i++){
			
			$this->number[] = ($inputNumber % 10);
			$inputNumber /= 10;
		
		}
		
		// 配列の前後を入れ替える
		for($i = 0; $i < FIGURE_LENGTH / 2; $i++){
		
			$temp = $this->number[$i];
			$this->number[$i] = $this->number[FIGURE_LENGTH - 1 - $i];
			$this->number[FIGURE_LENGTH - 1 - $i] = $temp;
			
		}
		
	}
	
	// 数値の配列を返すメソッド
	public function getNumber(){
		
		return $this->number;
		
	}
	
	// 履歴の配列に引数を追加するメソッド
	public function addHistory($history){
	
		$this->history[] = $history;
	
	}
	
	// 履歴の配列を返すメソッド
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