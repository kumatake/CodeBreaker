<?php

require("eatBite.php");
//require("matchPlayer.php");
require("player.php");


class gameMaster
{

	private $turn;			// 手番制御用
	private $playFlg;		// プレイヤー数制御用
	private $digitNumber;	//数列の桁数(現状3で固定)
	private $mPlayer;		// matchPlayerクラスを格納する
	protected $player1;		// playerクラスを格納する
	protected $player2;		// playerクラスを格納する

	public function __construct(){
	
		$this->digitNumber = 3;
/*		$this->mPlayer = new matchPlayer();
		if($mPlayer->match()){
			if(mt_rand(0, 1))
				$turn = true;
			else
				$turn = false;
		}*/
		
		$this->turn = true;
		
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
	
	public function startGame(){
	
		$this->playGame();
	
	}

	public function endGame(){
	
		echo nl2br("\n終了します。");

	}
	
	public function divideNumber($number, $digit){
	
		// 数値を分ける
		for($i = 0; $i < $digit; $i++){
			
			$aNumber[] = ($number % 10);
			$number /= 10;
		
		}
		
		// 配列の前後を入れ替える
		for($i = 0; $i < $digit / 2; $i++){
		
			$temp = $aNumber[$i];
			$aNumber[$i] = $aNumber[$digit - 1 - $i];
			$aNumber[$digit - 1 - $i] = $temp;
			
		}
		
		return $aNumber;
	
	}

	public function playGame($answer){
		
		$aNumber = $this->divideNumber($answer, $this->digitNumber);
		
		$result = $this->judgeNum($aNumber);
		
		$resultText = $answer . ' ' . $result->getEat() . 'EAT ' 
			. $result->getBite() . nl2br("BITE\n");
		
		echo $resultText;
		
		if($this->turn)
			$this->player1->addHistory($resultText);
		else
			$this->player2->addHistory($resultText);
		
		if($result->getEat() === 3){
			
			if($this->turn)
				echo 'Player1Win!' . nl2br("\n");
			else
				echo 'Player2Win!' . nl2br("\n");
				
			$this->endGame();
			
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
		
			echo nl2br($history);
		
		}
		
	}
	
	//player2の履歴を出力
	public function player2History(){
	
		$history = $this->player1->getHistory();
			
		if(count($history) === 0){
			
			echo 'なし';
			return;
		
		}
		
		foreach($history as $output){
		
			echo nl2br($history);
		
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
