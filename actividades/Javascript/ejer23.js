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
        let numeroDNI = window.prompt('indica el numero del DNI (8 numeros)');
        let letra = numeroDNI%23;
        let arrayLetras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
        document.getElementById('main').innerHTML = "El DNI con numero "+numeroDNI+" tiene la letra "+arrayLetras[letra];
    }
  };