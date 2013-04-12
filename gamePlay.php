<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>コードブレイカー</title>
<?php
include('gameMaster.php'); 
$f = file_get_contents('gameM');
$a = unserialize($f);

//処理書く
if(isset($_POST['call'])){
	$a->playGame($_POST['answer']);
}
$f = serialize($a);
file_put_contents('gameM',$f);

?>
</head>

<body>
<div id="main">
<p>相手の数列の予想を入力してください</p>
<form action="./gamePlay.php" method="post">
<input type="text" name="answer" />
<input type="submit" name="call" value="コール" />
</form>
</div>
<div id="his">
<p>コール履歴</p>
<?php
	
 ?>
</div>
</body>
</html>