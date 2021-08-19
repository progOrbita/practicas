/*
Crear un documento HTML (ejer13js.html) en el que se incluya un documento Javascript (ejer13.js) 
externo que realice el siguiente proceso:
Se trata de implementar un programa que determine el factorial (!) de un numero introducido por teclado.
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let num = window.prompt('Indica un numero y escribire el factorial');
        let factorial = 1;
            for (i=1; i <= num; i++) { 
                factorial *= i;
            }
            document.getElementById('main').innerHTML = "El Factorial de <b>"+num+"</b> es <b>"+factorial+"</b>";
        }
  };