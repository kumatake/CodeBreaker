<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./style.css" type="text/css" media="screen" />
<title>ゲームプレイ</title>
<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);
$numFlg = 0;
$setnum = array();

if(isset($_POST['setdigit'])){
	
		$a->setLength($_POST['setdigit']);
	
}
//処理書く
if(isset($_POST['set1'])){
	
	for($j=0;$j<$a->getLength();$j++){
		
		if($_POST[$j] != '')
			$setnum[] = (int)$_POST[$j];
	}
	if(count($setnum) !== $a->getLength()){
		
		$numFlg = 1;
		
	}else if($a->checkOverlap($setnum)){
		
		$numFlg = 2;
		
	}else{
		
		$a->player1set($setnum);
		$a->changeTurn();
		
	}
}elseif(isset($_POST['set2'])){
	
	for($j=0;$j<$a->getLength();$j++){
		
		if($_POST[$j] != '')
			$setnum[] = (int)$_POST[$j];
	}
	if(count($setnum) !== $a->getLength()){
		
		$numFlg = 1;
		
	}else if($a->checkOverlap($setnum)){
		
		$numFlg = 2;
		
	}else{
		
		$a->player2set($setnum);
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

<div id="main">
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
	echo "<input type='password' name='$i' maxlength='1' size='1'>";
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
