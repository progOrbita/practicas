/*
Crear un documento HTML (ejer15js.html) en el que se incluya un documento Javascript (ejer15.js) 
externo que realice el siguiente proceso:
El programa debe mostrar por pantalla todos los números múltiplos de 2 y 3 simultáneamente, comprendidos entre 1 y 1000.
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numero = 1000;
        let multiplos = "";
            for (i=1; i <= numero; i++) { 
                if(i%2 == 0 || i%3 == 0){
                    multiplos += i+", ";
                }
            }
            document.getElementById('main').innerHTML = "Multiplos de 2 y 3 <br/>"+multiplos;
        }
  };