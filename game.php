<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ゲームプレイ</title>
<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);

//処理書く
if(isset($_POST['set1'])){
	$a->player1set($_POST['setnum']);
	$a->changeTurn();
	//echo $_POST['setnum'];
}elseif(isset($_POST['set2'])){
	$a->player2set($_POST['setnum']);
	$a->changeTurn();
	echo '<meta http-equiv="refresh" content="0; url=./gamePlay.php">';
}

$f = serialize($a);
file_put_contents('gameM',$f);

?>

</head>

<body>

<div id="numset">
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
 if(isset($_POST['set1'])){
	echo "\"set2\"";
}else{
	echo "\"set1\"";
}?> value="OK" /> 
</form>
</div>

</body>
</html>
