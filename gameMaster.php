<?

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
		$this->mPlayer = new match();
		if($mPlayer->match()){
			if(mt_rand(0, 1))
				$turn = true;
			else
				$turn = false;
		}
	}

	public function startGame(){
		$this->player1 = new Player(3);
		$this->player2 = new Player(3);
		playGame();
	}

	public function endGame(){

	}

	public function playGame(){
	
		if($this->turn){
		
			$atkPlayer = $this->player1;
			$defPlayer = $this->player2;
		
		} else {
			
			$atkPlayer = $this->player2;
			$defPlayer = $this->player1;
			
		}
		
		//TODO:入力待ちの処理
		$answer = 192;
		
		// 数値を分ける
		for($i = 0; $i < $this->digitNumber; $i++){
			
			$aNumber[] = ($answer % 10);
			$inputNumber /= 10;
		
		}
		
		// 配列の前後を入れ替える
		for($i = 0; $i < FIGURE_LENGTH / 2; $i++){
		
			$temp = $this->number[$i];
			$this->number[$i] = $this->number[FIGURE_LENGTH - 1 - $i];
			$this->number[FIGURE_LENGTH - 1 - $i] = $temp;
			
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

				if(aNumber[$i] === $answer[$j]){
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
