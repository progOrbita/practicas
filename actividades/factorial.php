<?php
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Factorial</title>
        <meta charset="UTF-8"/>
    <style type="text/css">
        body{
            margin-left: 45%;
        }
        input{
            margin: 5px;
        }
        input[type="number"]{
            width: 75px;
        }
    </style>
    </head>
    <body>
        <h2>FACTORIAL:</h2>
        <form method="GET" action="factorialNum.php">
            <label>Numero:</label><input type="number" name="numero"><br/>
            <input type="submit" value="enviar" name="submit" id="submit">
        </form>
    </body>
    </html>';
?>