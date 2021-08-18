<?php
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Factorial de un numero</title>
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
    <body>';
        if(isset($_GET['numero'])){
            $num = $_GET['numero'];
            $total = 1;
            for ($i=1; $i <= $num; $i++) { 
                $total *= $i;
            }
            echo "El Factorial de <b>".$num."</b> es <b>".$total."</b>";
        }
    echo'
    <br/><a href="factorial.php">volver</a>
    </body>
    </html>';
?>