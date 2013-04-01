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
	
	}
	
	public function startGame(){
	
	}
	
	public function endGame(){
	
	}
	
	public function playGame(){
	
	}
	
	// 正誤判定
	public function judgeNum($aNumber){
		
		if($his->turn)
			$answer = $this->player2->getNumber();
		else
			$answer = $this->player1->getNumber();
		
	
		for($i = 0; $i < $this->digitNumber; $i++){
			for($j = 0; $j < $this->digitNumber; $j++){
			
				if(aNumber[$i] === $answer[$j]){
					if($i === $j)
						
					
				
				}
			
			}
		}
	
	}
	
	public function clear(){
	
	}

}

// 以下、テストコード