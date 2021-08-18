/*
Crear un documento HTML (ejer10js.html) en el que se incluya un documento Javascript (ejer10.js) 
externo que realice el siguiente proceso:
El programa debe leer la longitud de los tres lados de un triángulo y debe mostrar un mensaje indicando el tipo de triángulo: EQUILÁTERO, ISÓSCELES o ESCALENO
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numA = window.prompt("Un lado del triangulo");
        let numB = window.prompt("Otro lado del triangulo");
        let numC = window.prompt("Y el tercer lado del triangulo");
        if(numA == numB && numB == numC){
            window.alert('El triangulo es equilatero');
            return;
        }
        //Si dos lados cualesquiera son iguales.
        if(numA == numB || numA == numC || numB == numC){
            window.alert('El triangulo es isoceles');
            return;
        }
        else{
            window.alert('El triangulo es escaleno');
        }
    }
  };
