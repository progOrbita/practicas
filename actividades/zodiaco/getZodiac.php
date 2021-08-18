<?php
echo '<!DOCTYPE html>
<html>
<head>
    <title>Signo del zodiaco</title>
    <meta charset="UTF-8"/>
<style type="text/css">
    p{
        margin-left: 45%;
    }
</style>
</head>
<body>';




if(isset($_GET['submit'])){
    if(isset($_GET['nombre'])){
        $name = $_GET['nombre'];
        echo "<p>Hola <b>".$name."</b></p>
                <p> Tu horoscopo es:</p>";
    }
    if(isset($_GET['dia'])&& isset($_GET['mes'])){
        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        if($dia > 31 || $mes > 12){
            echo "<p style='color:red; font-size:28px'>Pon valores correctos</p>";
            return;
        }
        if($dia >= 20 && $mes == 1 || $dia <= 18 && $mes == 2){
            echo "<p><img src='signo-acuario.gif'></img><br/>Acuario</p>";
        }
        if($dia >= 19 && $mes == 2 || $dia <= 20 && $mes == 3){
            echo "<p><img src='signo-piscis.gif'></img><br/>Piscis</p>";
        }
        if($dia >= 21 && $mes == 3 || $dia <= 19 && $mes == 4){
            echo "<p><img src='signo-aries.gif'></img><br/>Aries</p>";
        }
        if($dia >= 20 && $mes == 4 || $dia <= 20 && $mes == 5){
            echo "<p><img src='signo-tauro.gif'></img><br/>Tauro</p>";
        }
        if($dia >= 21 && $mes == 5 || $dia <= 20 && $mes == 6){
            echo "<p><img src='signo-geminis.gif'></img><br/>Geminis</p>";
        }
        if($dia >= 21 && $mes == 6 || $dia <= 22 && $mes == 7){
            echo "<p><img src='signo-cancer.gif'></img><br/>Cancer</p>";
        }
        if($dia >= 23 && $mes == 7 || $dia <= 22 && $mes == 8){
            echo "<p><img src='signo-leo.gif'></img><br/>Leo</p>";
        }
        if($dia >= 23 && $mes == 8 || $dia <= 22 && $mes == 9){
            echo "<p><img src='signo-virgo.gif'></img><br/>Virgo</p>";
        }
        if($dia >= 23 && $mes == 9 || $dia <= 22 && $mes == 10){
            echo "<p><img src='signo-libra.gif'></img><br/>Libra</p>";
        }
        if($dia >= 23 && $mes == 10 || $dia <= 21 && $mes == 11){
            echo "<p><img src='signo-escorpio.gif'></img><br/>Escorpio</p>";
        }
        if($dia >= 22 && $mes == 11 || $dia <= 21 && $mes == 12){
            echo "<p><img src='signo-sagitario.gif'></img><br/>Sagitario</p>";
        }
        if($dia >= 22 && $mes == 12 || $dia <=19 && $mes == 1){
            echo "<p><img src='signo-capricornio.gif'></img><br/>Capricornio</p>";
        }
        echo "<p>".$dia."/".$mes."</p>";
    }
}
echo "
    <a href='horoscopoZodiac.php'>Volver</a>
    </body>
    </html>";
?>