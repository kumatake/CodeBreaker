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
	if(!$a->checkOverlap($answer)){
		$a->playGame($answer);	
	}else{
		echo '<font size="5" color="#FF0000"><b>数字が重複しています。入力しなおしてください。</b></font>';
	}
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