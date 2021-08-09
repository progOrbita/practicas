<?php
/*
5. Practica PHP, CSS, HTML, JS
- Crear un formulario con un campo de texto, otro campo numérico, un campo de fecha y un botón de guardar.
- Añadir estilos con un archivo .css, realizar un diseño al gusto.
- Crear un archivo .php que valide los datos del formulario si los campos están vacíos, retornar un valor y mostrar en el archivo principal si esta correcto o incorrecto los datos del formulario.

- Si el input esta vacio/incorrecto remarcarlo en rojo. Si esta correcto, remarcarlo en verde.


*/
	include 'Resources.php';
if(isset($_POST['texto'])){
	$validate = new Resources();
	$array_datos = ["texto" => $_POST['texto'],"numerico" => $_POST['numerico'],"fecha" => $_POST['fecha']];
	$datos = $validate->validacion($array_datos);
	echo json_encode($datos);

}



?>



