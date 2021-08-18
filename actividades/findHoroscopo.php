<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <?php
            if(isset($_GET['date'])){
                $fecha = $_GET['date'];
                echo "<h1>HORÓSCOPO CHINO</h1>
                        <p>año de Nacimiento: <b>".$fecha."</b><br/>
                        <p>Eres:</p>";
                $horoscopos = [ 
                    0 => "<img src='mono.png'>",
                     1 => "<img src='gallo.png'>",
                     2 => "<img src='perro.png'>",
                     3 => "<img src='cerdo.png'>",
                     4 => "<img src='raton.png'>",
                     5 => "<img src='buey.png'>",
                     6 => "<img src='tigre.png'>",
                     7 => "<img src='conejo.png'>",
                     8 => "<img src='dragon.png'>",
                     9 => "<img src='serpiente.png'>",
                     10 => "<img src='caballo.png'>",
                     11 => "<img src='cabra.png'>"
                ];
                echo $horoscopos[$fecha%12];
                echo "<br/><a href=horoscopo.php>Volver</a>";
            }
        ?>
    </body>
</html>