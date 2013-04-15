<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ゲームプレイ</title>
<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);
$numFlg = false;

//処理書く
if(isset($_POST['set1'])){
	if(!$a->checkOverlap($_POST['setnum'])){
		$a->player1set($_POST['setnum']);
		$a->changeTurn();
	}else{
		$numFlg = true;
	}
	//echo $_POST['setnum'];
}elseif(isset($_POST['set2'])){
	if(!$a->checkOverlap($_POST['setnum'])){
		$a->player2set($_POST['setnum']);
		$a->changeTurn();
		$a->randTurn();
		echo '<meta http-equiv="refresh" content="0; 	url=./gamePlay.php">';
	}else{
		$numFlg = true;
	}
}

$f = serialize($a);
file_put_contents('gameM',$f);

?>

</head>

<body>

<div id="numset">
<p><?php
	if($numFlg){
		echo '数字が重複しています。入力しなおしてください。';
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
<input type="password" name="setnum" maxlength="<?php echo $a->getLength(); ?>"/>
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
