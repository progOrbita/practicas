<?php
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Signo del zodiaco</title>
        <meta charset="UTF-8"/>
    <style type="text/css">
        input{
            margin: 5px;
        }
        input[type="number"]{
            width: 75px;
        }
    </style>
    </head>
    <body>
        <h2>TU HORÓSCOPO</h2>
        <form method="GET" action="getZodiac.php">
            <label>Nombre:</label><input type="text" name="nombre" id="nombre"><br/>
            <label>Fecha Nac. Día:</label><input type="number" name="dia" id="dia"><label>Mes:</label><input type="number" name="mes" id="mes"><br/>
            <input type="submit" value="enviar" name="submit" id="submit">
        </form>
    </body>
    </html>';
?>