<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ゲームプレイ</title>
<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);
$numFlg = 0;
$setnum;

if(isset($_POST['setdigit'])){
	if($a->getLength() == 0){
		$a->setLength($_POST['setdigit']);
	}
}
//処理書く
if(isset($_POST['set1'])){
	for($j=0;$j<$a->getLength();$j++){
		$setnum[] = (int)$_POST[$j];
		echo $_POST[$j];
	}
	var_dump($setnum);
	if(count($a->divideNumber($_POST['setnum'])) !== $a->getLength()){
		
		$numFlg = 1;
		
	}else if($a->checkOverlap($_POST['setnum'])){
		
		$numFlg = 2;
		
	}else{
		
		$a->player1set($_POST['setnum']);
		$a->changeTurn();
		
	}
	//echo $_POST['setnum'];
}elseif(isset($_POST['set2'])){
	
	if(count($a->divideNumber($_POST['setnum'])) !== $a->getLength()){
		
		$numFlg = 1;
		
	}else if($a->checkOverlap($_POST['setnum'])){
		
		$numFlg = 2;
		
	}else{
		
		$a->player2set($_POST['setnum']);
		$a->changeTurn();
		$a->randTurn();
		echo '<meta http-equiv="refresh" content="0; 	url=./gamePlay.php">';
		
	}
	
}

$f = serialize($a);
file_put_contents('gameM',$f);

?>

</head>

<body>

<div id="numset">
<p><?php
	if($numFlg === 1){
		
		echo '<font size="5" color="#FF0000"><b>入力された桁数が正しくありません。入力しなおしてください。</b></font>';
		
	} else if($numFlg === 2){
		echo '<font size="5" color="#FF0000"><b>数字が重複しています。入力しなおしてください。</b></font>';
	}
?></p>
<p><?php
	if($a->getTurn()){
		echo 'プレイヤー１';
	}else{
		echo 'プレイヤー２';
	}
?></p>
<p>数列を入力してください</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

<?php
for($i=0;$i<$a->getLength();$i++){
	echo "<select name='$i'>
<option value='0' selected>0</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
</select>";
}
?>

<input type="submit" name=
<?php
if($a->getTurn()){
	echo "\"set1\"";
}else{
	echo "\"set2\"";
}?> value="OK" /> 
</form>
</div>

</body>
</html>
