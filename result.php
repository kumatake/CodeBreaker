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
	if(count($a->divideNumber($answer)) !== $a->getLength()){
		
		echo '<font size="5" color="#FF0000"><b>入力された桁数が正しくありません。入力しなおしてください。</b></font>';
	
	}else if($a->checkOverlap($answer)){
		
				echo '<font size="5" color="#FF0000"><b>数字が重複しています。入力しなおしてください。</b></font>';
		
		
	}else{
		
		$a->playGame($answer);	

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