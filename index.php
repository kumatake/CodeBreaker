<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="./style.css" type="text/css" media="screen" />
<title>コードブレイカー</title>
</head>
<body>

<?php
require_once('gameMaster.php'); 

//処理書く
$game = new gameMaster();

$f = serialize($game);
file_put_contents('gameM',$f);

?>
<header>
	<h1 id="index-title">Code Breaker</h1>
</header>

<div id="main">
	<p id="index-p">コードブレイカーを始めます</p>
	<p id="index-p">プレイする桁数を選択してください</p>
	<form id="index-form" action="./game.php" method="post">
	<input type="number" name="setdigit" max="5" min="3" value="3"/><br>
	<input type="submit" name="start" value="ゲームスタート" />
	</form>
</div>
</body>
</html>
