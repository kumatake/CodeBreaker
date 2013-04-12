<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>コードブレイカー</title>

<?php
require_once('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);

//処理書く
$answer = $_POST['answer'];
?>

</head>

<body>
<p><?php

	$a->playGame($answer);

 ?></p>
<?php
 
 	if($a->getendFlg())
		$a->endGame();
	else
		$a->continueGame();
		
	$f = serialize($a);
	file_put_contents('gameM',$f);
	
?>	
</body>
</html>