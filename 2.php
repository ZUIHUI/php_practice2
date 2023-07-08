<?php
	$a= isset($_POST["text"])?$_POST["text"]:null;
	setcookie("a",$a,time()+3600);
?>
<html>
<head>
</head>
<body>
<?php
	$b=isset($_COOKIE["a"])?$_COOKIE["a"]:null;
	
	if($b==true){
		echo $b;
	}
	else if($b==false){
		echo "N/A";
	}
?>

</body>
</html>