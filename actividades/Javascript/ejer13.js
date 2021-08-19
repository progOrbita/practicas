/*
Crear un documento HTML (ejer13js.html) en el que se incluya un documento Javascript (ejer13.js) 
externo que realice el siguiente proceso:
Implementar un programa que pida un número entero mayor que cero y que escriba sus divisores.
Entendemos por divisores, aquellos números entre los que podemos dividir el número y la división 
sea exacta (resto 0).
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let divisores = "";
        let num = window.prompt('Indica un numero (mayor que 0) y te dire los divisores');
        if(num < 0){
            window.alert('que sea mayor que 0');
        }
        else{
            for (let index = 0; index <= num; index++) {
                if(num%index == 0){
                    divisores += (index)+", ";
                }
            }
            document.getElementById('main').innerHTML = "Divisores de "+num+" : "+divisores;
        }
    }
  };