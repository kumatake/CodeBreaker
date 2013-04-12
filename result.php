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
$answer = $_POST['text'];
?>

</head>

<body>
<p><?php

	$a->playGame($answer);

 ?></p>
 <?php
 	
 ?>	
</body>
</html>