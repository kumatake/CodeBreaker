<?php

require_once("eatBite.php");
//require("matchPlayer.php");
require_once("player.php");


class gameMaster
{

	protected $turn;			// 手番制御用
	private $playFlg;		// プレイヤー数制御用
	protected $digitNumber;	//数列の桁数(現状3で固定)
	private $mPlayer;		// matchPlayerクラスを格納する
	protected $player1;		// playerクラスを格納する
	protected $player2;		// playerクラスを格納する
	protected $endFlg;		// 終了フラグ

	public function __construct(){
	
		$this->digitNumber = 0;

		
		$this->endFlg = false;
		$this->turn = true;
		
	}
	
	public function randTurn(){
		
		if(mt_rand(0,1))
			$this->turn = 0;
		else
			$this->turn = 1;
			
	}
	
	public function setLength($digit){
		$this->digitNumber = (int)$digit;
	}
	
	public function getLength(){
		return $this->digitNumber;
	}
	
	public function getTurn(){
		return $this->turn;
	}
	
	public function changeTurn(){
		$this->turn = !$this->turn;
	}
	
	public function checkOverlap($num){
		$n_array = $num;
		$c_array = array_count_values($n_array);
		for($i=0;$i < count($n_array);$i++){
			$key = $n_array[$i];
			$count = $c_array[$key];
			if($count > 1){
				return true;
			}
		}
		return false;
	}
	
	public function player1Set($num){
		
		$this->player1 = new Player($this->digitNumber);
		$this->player1->setNumber($num);
	
	}
	
	public function player2Set($num){
		
		$this->player2 = new Player($this->digitNumber);
		$this->player2->setNumber($num);
	
	}
	
	public function player1GetNum(){
		
		return $this->player1->getNumber($num);
		
	}
	
	public function player2GetNum(){
		
		return $this->player2->getNumber($num);
		
	}
	
	public function getendFlg(){
	
		return $this->endFlg;
		
	}
	
	public function startGame(){
	
		$this->playGame();
	
	}

	public function endGame(){
	
		echo '<meta http-equiv="refresh" content="2 ; URL=./gameEnd.php">';

	}
	
	public function continueGame(){
	
		echo '<meta http-equiv="refresh" content="2 ; URL=./gamePlay.php">';

	}
	
	public function divideNumber($number){
	
		// 数値を分ける
		do{
			
			$aNumber[] = ($number % 10);
			$number = floor( $number / 10);
		
		}while($number != 0);
		 
		
		$m = count($aNumber);
		
		// 配列の前後を入れ替える
		for($i = 0; $i < $m / 2; $i++){
		
			$temp = $aNumber[$i];
			$aNumber[$i] = $aNumber[$m - 1 - $i];
			$aNumber[$m - 1 - $i] = $temp;
			
		}
		
		return $aNumber;
	
	}

	public function playGame($answer){
		
		$aNumber = $answer;
		
		$result = $this->judgeNum($aNumber);
		
		$resultText = '';
		
		foreach($aNumber as $a)
			$resultText .= $a;
		
		$resultText .= ' ' . $result->getEat() . 'EAT ' 
			. $result->getBite() . "BITE";
		
		echo '<font size="6">' . $resultText . '</font>';
		
		if($this->turn)
			$this->player1->addHistory($resultText);
		else
			$this->player2->addHistory($resultText);
		
		if($result->getEat() === $this->digitNumber){
			
			if($this->turn)
				echo '<font color="#FF0000" size="7">Player1Win!</font>' . nl2br("\n");
			else
				echo '<font color="#FF0000" size="7">Player2Win!</font>' . nl2br("\n");
			
			$this->endFlg = true;
			
			return;
		}
		
		$this->turn = !$this->turn;
		

	}
	
	//player1の履歴を出力
	public function player1History(){
	
		$history = $this->player1->getHistory();
			
		if(count($history) === 0){
			
			echo 'なし';
			return;
		
		}
		
		foreach($history as $output){
		
			echo $output . '</BR>';
		
		}
		
	}
	
	//player2の履歴を出力
	public function player2History(){
	
		$history = $this->player2->getHistory();
			
		if(count($history) === 0){
			
			echo 'なし';
			return;
		
		}
		
		foreach($history as $output){
		
			echo $output . '</BR>';
		
		}
		
	}

	// 正誤判定
	public function judgeNum($aNumber){

		if($this->turn)
			$answer = $this->player2->getNumber();
		else
			$answer = $this->player1->getNumber();


		$eat = 0;
		$bite = 0;

		for($i = 0; $i < $this->digitNumber; $i++){
			for($j = 0; $j < $this->digitNumber; $j++){

				if($aNumber[$i] === $answer[$j]){
					if($i === $j)
						$eat++;
					else
						$bite++;
					
					break;
				}

			}
		}

		$resultEatBite = new eatBite();
		$resultEatBite->setEat($eat);
		$resultEatBite->setBite($bite);

		return $resultEatBite;


	}

}

// 以下、テストコード
//$test = new gameMaster();
//judgeNum用

?>
