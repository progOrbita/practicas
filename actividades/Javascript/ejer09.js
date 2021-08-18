/*
Crear un documento HTML (ejer09.html) en el que se incluya un documento Javascript (ejer09.js) externo que realice el siguiente proceso:
Se deben leer tres números e indicar si se han introducido en orden creciente.
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numA = window.prompt("Un numero, necesito un numero");
        let numB = window.prompt("otro numero, necesito otro numero");
        let numC = window.prompt("mas numeros, necesito mas numeros");
        if(numC > numB && numB > numA){
            window.alert('estan en orden creciente');
        }
        else{
            window.alert('no estan en orden creciente');
        }
    }
  };
