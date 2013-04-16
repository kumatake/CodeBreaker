<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

<div>
<p>コードブレイカーを始めます</p>
<form action="./game.php" method="post">
<input type="number" name="setdigit" max="5" min="3" /><br>
<input type="submit" name="start" value="ゲームスタート" />
</form>
</div>
</body>
</html>
