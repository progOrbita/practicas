/*
Crear un documento HTML (ejer23js.html) en el que se incluya un documento Javascript (ejer23.js) 
externo que realice el siguiente proceso:
Implementar una función llamada nif(dni) que reciba como argumento el DNI de una persona y devuelva la letra del NIF correspondiente.
La letra se calcula del siguiente modo:
n = DNI % 23
Con el valor de n podemos ir a la siguiente tabla para obtener la letra correspondiente
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        function conversor(euros){
            return (euros*0.75);
        }
        let cantidadEuros = window.prompt('indica los euros para pasarlos a dolars');
        let cantidadDolars = parseFloat(conversor(cantidadEuros));
        document.getElementById('main').innerHTML = cantidadEuros+" son "+cantidadDolars+" dolares";
    }
  };