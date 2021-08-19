/*
Crear un documento HTML (ejer20js.html) en el que se incluya un documento Javascript (ejer20.js) 
externo que realice el siguiente proceso:
Pitágoras descubrió que existía otra forma de hallar la potencia cuadrática de un número (n). 
Este proceso consiste en sumar todos los números impares empezando de la unidad hasta cubrir 
la cantidad de números que sean igual a la base dada.
Implementar un programa que calcule el cuadrado de un número, leído por teclado, utilizando este sistema.
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numero = window.prompt('indica el numero para que indique su cuadrado');
        let cuadrado = 0;
        let base = 0;
        for (let index = 1; index; index++) {
            if(index%2 != 0){
                base++;
                cuadrado += index;
            }
            if(numero == base){
                window.alert('El cuadrado de '+numero+' es '+cuadrado);
                return;
            }
            
            
        }
    }
  };