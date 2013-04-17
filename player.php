<?php

class player
{
	
	
	
	protected $number;		// 最初に設定する数列
	protected $history;		// 履歴の配列
	protected $digitNumber;	// 数値の桁数
	
	public function __construct($digit){
	
		$this->digitNumber = $digit;
	
	}
	
	// 引数の数値を一つずつ配列に入れるメソッド
	public function setNumber($inputNumber){
		
		$this->number = $inputNumber;
		
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
//$player1 = new player(3);
//$player1->setNumber(array(1,2,3));
//var_dump($player1->getNumber());


/*$player1 = new player(3);
$player2 = new player(3);

$player1->setNumber(192);
$player2->setNumber(168);

$player1->addHistory('108 2EAT 0BITE');
$player2->addHistory('921 0EAT 3BITE');

var_dump($player1->getNumber());
var_dump($player2->getNumber());
var_dump($player1->getHistory());
var_dump($player2->getHistory());*/

?>