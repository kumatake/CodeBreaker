<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./style.css" type="text/css" media="screen" />
<title>コードブレイカー</title>

<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);
$numFlg = false;

$f = serialize($a);
file_put_contents('gameM',$f);

?>
</head>

<body>
<header>
	<h1 id="index-title">Code Breaker</h1>
</header>

<div id="main">
<p><?php
	if($a->getTurn()){
		echo 'プレイヤー１のターン';
	}else{
		echo 'プレイヤー２のターン';
	}
?></p>
<p>相手の数列の予想を入力してください</p>
<form action="./result.php" method="post">

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