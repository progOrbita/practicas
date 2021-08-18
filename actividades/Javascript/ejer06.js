/*
Crear un documento HTML (ejer06.html) en el que se incluya un documento Javascript (ejer06.js) externo que realice el siguiente proceso:
1º) Leemos una cantidad numérica llamada tope con un prompt.
2º) Leemos otra cantidad numérica llamada valor con otro prompt.
3º) Si valor es mayor que tope mostramos un alert que nos diga que hemos excedido el tope y 
en cuánto nos hemos excedido.
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let tope = window.prompt("Di el numero limite");
        let valor = window.prompt('Di cualquier numero');
        if(valor > tope){
            window.alert('Te has pasado por '+(valor-tope)+' unidades');
        }
    }
  };
