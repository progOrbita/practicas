/*
Crear un documento HTML (ejer18js.html) en el que se incluya un documento Javascript (ejer18.js) 
externo que realice el siguiente proceso:
Implementar un programa que muestre por pantalla lo siguiente
*
**
***
****
*****
******
*******
********
*********
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numero = parseFloat(window.prompt('Un numero para poner puntos'));
        for (let index = 1; index <= numero; index++) {
            for (let cantidad = 0; cantidad < index; cantidad++) {
                document.getElementById('main').innerHTML += '*';
            }
            document.getElementById('main').innerHTML += '<br/>';
        }
    }
  };