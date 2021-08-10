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
                        switch($fecha%12){
                            case 0:
                                echo "<img src='raton.png'>";
                            case 1:
                                echo "<img src='Buey.png'>";

                        }
                echo "<br/><a href=horoscopo.php>Volver</a>";
            }
        ?>
    </body>
</html>