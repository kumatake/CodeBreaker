<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<title>コードブレイカー</title>
</head>

<body>
<header>
<div id="header-in">
</div>
</header>

<div id="main">
<p>テストなう</p>
<?php
echo "NUM=";
if(isset($_POST['submit'])){

	$num = $_POST['text'];
	++$num;
	//echo $_POST['text'];
	echo $num;
}else{
	$num = 0;
	echo $num;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="submit" name="submit" value="start">
<input type="text" name="text" value="<? echo $num; ?>">
</form>
</div>

<footer>
<div id="footer-in">
</div>
</footer>
</body>
</html>
