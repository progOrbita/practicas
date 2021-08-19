/*
Crear un documento HTML (ejer16js.html) en el que se incluya un documento Javascript (ejer16.js) 
externo que realice el siguiente proceso:
El programa debe leer un numero por teclado y debe indicar si el numero es primo o no. Recordamos que un numero es primo si solo es divisible
(resto o) por sí mismo y por la unidad
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numero = window.prompt("Indica numero e indicare si es primo o no");
        let primo = 0;
            for (i=1; i <= numero; i++) { 
                if(numero%i == 0){
                    primo++;
                }
                if(primo > 2){
                    window.alert('El numero '+numero+' no es primo');
                    return;
                }
            }
            if(primo = 2){
                window.alert('el numero '+numero+' es primo');
            }
            
        }
  };