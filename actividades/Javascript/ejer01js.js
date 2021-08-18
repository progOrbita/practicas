/*
Crear un documento HTML (ejer01js.html) en el que se incluya un documento Javascript (ejer01.js) 
externo que realice el siguiente proceso:
1º) Pedir tu nombre. Lo leeremos utilizando la función prompt.
2º) Pedir tu primer apellido. Lo leeremos utilizando la función prompt.
3º) Pedir tu segundo apellido. Lo leeremos utilizando la función prompt.
4º) Mostrar en el documento del navegador (no con una ventana alert) los tres datos leídos separados por espacios
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let nombre = window.prompt("Tu nombre:");
        let apellidoA = window.prompt("Tu primer apellido:");
        let apellidoB = window.prompt("Tu segundo apellido:");
        document.getElementById('nombre').innerHTML = nombre+" "+apellidoA+" "+apellidoB;
    }
  };
