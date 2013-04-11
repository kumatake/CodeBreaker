<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ゲームプレイ</title>
<script type="application/javascript" src="js/jquery.js"></script>

</head>

<?php
include('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);

//処理書く
if(isset($_POST['set1'])){
	
}

$f = serialize($a);
file_put_contents('gameM',$f);

?>

<body>

<div id="pset1">
<p>P1の数列を入力してください</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="setnum1" />
<input type="submit" name="set1" value="OK" /> 
</form>
</div>

<div id="pset2" style="display:none">
<p>P2の数列を入力してください</p>
<form action="./gameMaster.php" method="post">
<input type="text" name="setnum2" />
<input type="submit" name="set2" value="OK" />
</form>
</div>

<div id="play" style="display:none">
<p>数列を入力してください</p>
<form action="./gameMaster.php" method="GET" >
<input type="text" name="text" />
<input type="submit" name="submit" value="OK" />
</form>
</div>

</body>
</html>
