/*
Crear un documento HTML (ejer19bjs.html) en el que se incluya un documento Javascript (ejer19b.js) 
externo que realice el siguiente proceso:
Se trata de imprimir en la página las todas las tablas de multiplicar. Del 1 al 9, es decir, la tabla del 1, 
la del 2, del 3..
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        for (let index = 1; index <= 10; index++) {
            document.getElementById('main').innerHTML += "<h2><b>Tabla de "+index+":</b></h2>";
            for (let numeros = 1; numeros <= 10; numeros++) {
                document.getElementById('main').innerHTML += index+" x "+numeros+" = "+(index*numeros)+"<br/>";
            }
        }
        
    }
  };