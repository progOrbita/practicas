
<!DOCTYPE html>
<html>
<head>
	<title>multiplos varios</title>
<style type="text/css">
	table, th, tr, td{
		border: 1px solid;
	}
	td{
		min-width: 50px;
		text-align: center;
	}
	td:first-child{
		min-width: 150px;
	}
	tbody > th{
		width: 300px;
	}
</style>
</head>
<body>
<?php
if(isset($_GET['num'])){
	$numero = $_GET['num'];
	echo "<table><th colspan='2'><b>TABLA DEL".$numero."</b></th>";
			for ($i=0; $i <= 10; $i++) { 
				echo "<tr><td>".$numero."x".$i."</td><td>".$numero*$i."</td></tr>";
			}		
		echo "</table>";
	}
	echo "<a href='index.html'>return</a>";
?>
</body>
</html>