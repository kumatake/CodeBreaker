<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>コードブレイカー</title>
<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);
$numFlg = false;

//処理書く
if(isset($_POST['call'])){
	if(!$a->checkOverlap($_POST['answer'])){
		$a->playGame($_POST['answer']);
	}else{
		$numFlg = true;
	}
}
$f = serialize($a);
file_put_contents('gameM',$f);

?>
</head>

<body>
<div id="main">
<p><?php
	if($numFlg){
		echo '数字が重複しています。入力しなおしてください。';
	}
?></p>
<p><?php
	if($a->getTurn()){
		echo 'プレイヤー１のターン';
	}else{
		echo 'プレイヤー２のターン';
	}
?></p>
<p>相手の数列の予想を入力してください</p>
<form action="./result.php" method="post">
<input type="text" name="answer" maxlength="<?php echo $a->getLength(); ?>"/>
<input type="submit" name="call" value="コール" />
</form>
</div>

<div id="his" style="height:auto; width:600px;">

<div id="myhis" style="height:auto; width:300px; float:left;">
<p>P1のコール履歴</p>
<p>
<?php
	$a->player1History();
 ?>
</p>
</div>

<div id="enhis" style="height:auto; width:300px; float:left;">
<p>P2のコール履歴</p>
<p>
<?php
	$a->player2History();
?>
</p>
</div>

</div>
</body>
</html>