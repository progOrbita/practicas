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
                            case 0: //1992 por ejemplo
                                echo "<img src='mono.png'>";
                                break;
                            case 1:
                                echo "<img src='gallo.png'>";
                                break;
                            case 2:
                                echo "<img src='perro.png'>";
                                break;
                            case 3:
                                echo "<img src='cerdo.png'>";
                                break;
                            case 4:
                                echo "<img src='raton.png'>";
                                break;
                            case 5:
                                echo "<img src='buey.png'>";
                                break;   
                            case 6:
                                echo "<img src='tigre.png'>";
                                break; 
                            case 7:
                                echo "<img src='conejo.png'>";
                                break;
                            case 8:
                                echo "<img src='dragon.png'>";
                                break;
                            case 9:
                                echo "<img src='serpiente.png'>";
                                break;
                            case 10:
                                echo "<img src='caballo.png'>";
                                break;
                            case 11:
                                echo "<img src='oveja.png'>";
                               break;
                        }
                echo "<br/><a href=horoscopo.php>Volver</a>";
            }
        ?>
    </body>
</html>