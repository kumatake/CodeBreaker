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
echo "NUM=0";
if($_POST['submit']){
	echo $num;
	++$num;
	//echo $_POST['text'];
	echo $num;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="submit" name="submit" value="start">
<input type="text" name="text">
</form>
</div>

<footer>
<div id="footer-in">
</div>
</footer>
</body>
</html>
