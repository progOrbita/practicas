<?php 
$start = 1960;
echo "<!DOCTYPE html>
<html>
<head>
	<title>multiplos varios</title>
	<meta charset='UTF-8'/>
<style type='text/css'>
table, p{
	border: 1px black solid;
    width: 360px;
}
p{
	margin-bottom: 0px;
	border-bottom: 0px;	
	text-align: center;
	font-size: 20px;
}
</style>
</head>
<body>
    <p><b>HORÓSCOPO CHINO<br/>
    Selecciona tu año de nacimiento</b>
    </p>
    <table>";
    for ($i=0; $i <= 6; $i++) { 
        echo "<tr>";
        for ($j=0; $j < 10; $j++) {
            $date = $start+$i*10+$j; 
            echo "<td><a href='findHoroscopo.php?date=".$date."'>".$date."</a></td>";
        }
        echo "</tr>";
    }		    		
    echo "</table>
</body>
</html>";

?>