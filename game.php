<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ゲームプレイ</title>
<script type="application/javascript" src="js/jquery.js"></script>
<?php
include('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);

//処理書く
if(isset($_POST['set1'])){
	$a->player1set($_POST['setnum']);
	//echo $_POST['setnum'];
}elseif(isset($_POST['set2'])){
	$a->player2set($_POST['setnum']);
	echo '<meta http-equiv="refresh" content="0; url=./gamePlay.php">';
}

$f = serialize($a);
file_put_contents('gameM',$f);

?>

</head>

<body>

<div id="numset">
<p>あなたの数列を入力してください</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="setnum" />
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
