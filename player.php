<?

class player
{

	protected $number;	//最初に設定する数列
	protected $history;	//履歴の配列
	
	public setNumber($inputNumber){
		
		$this->number = $inputNumber;
		
	}
	
	public getNumber(){
		
		return $this->number;
		
	}
	
	public addHistory($history){
	
		array_push($this->history, $hisroty);
	
	}
	
	public getHistory(){
	
		return $this->history;
	
	}

} 