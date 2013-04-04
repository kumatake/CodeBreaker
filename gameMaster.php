<?

require("eatBite.php");
//require("matchPlayer.php");
require("player.php");


class gameMaster
{

	private $turn;			// 手番制御用
/*	private $number;		// 配列 数列の正誤判定用
	private $answer;		// 配列 数列の正誤判定用*/
	private $playFlg;		// プレイヤー数制御用
	private $digitNumber;	//数列の桁数(現状3で固定)
	private $mPlayer;		// matchPlayerクラスを格納する
	private $player1;		// playerクラスを格納する
	private $player2;		// playerクラスを格納する

	public function __construct(){
	
		$this->digitNumber = 3;
/*		$this->mPlayer = new matchPlayer();
		if($mPlayer->match()){
			if(mt_rand(0, 1))
				$turn = true;
			else
				$turn = false;
		}*/
		
		$turn = true;
		
	}

	public function startGame($p1Num, $p2Num){
		$this->player1 = new Player(3);
		$this->player2 = new Player(3);
		$this->player1->setNumber($p1Num);
		$this->player2->setNumber($p2Num);
		$this->playGame();
	}

	public function endGame(){
	
		echo "終了します。\n";

	}

	public function playGame(){
		
		//TODO:入力待ちの処理
		$answer = 192;
		$inputNumber = $answer;
		
		// 数値を分ける
		for($i = 0; $i < $this->digitNumber; $i++){
			
			$aNumber[] = ($inputNumber % 10);
			$inputNumber /= 10;
		
		}
		
		// 配列の前後を入れ替える
		for($i = 0; $i < $this->digitNumber / 2; $i++){
		
			$temp = $aNumber[$i];
			$aNumber[$i] = $aNumber[$this->digitNumber - 1 - $i];
			$aNumber[$this->digitNumber - 1 - $i] = $temp;
			
		}
		
		$result = $this->judgeNum($aNumber);
		
		echo $answer . ', ' . $result->getEat() . ', ' . $result->getBite() . "\n";
		
		if($result->getEat() === 3){
			
			if($this->turn)
				echo 'Player1Win!' . "\n";
			else
				echo 'Player2Win!' . "\n";
				
			$this->endGame();
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

	public function clear(){

	}

}

// 以下、テストコード
$test = new gameMaster();
//judgeNum用
$test->startGame(192,168);
