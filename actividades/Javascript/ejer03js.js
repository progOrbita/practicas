/*
Crear un documento HTML (ejer03.html) en el que se incluya un documento Javascript (ejer03.js) externo que realice el siguiente proceso:
1º) Calcularemos el área de un círculo a partir de su radio que leeremos mediante un prompt
2º) Leemos el radio
3º) Calculamos el área del círculo (área = PI * radio2
)
4º) Mostramos el resultado mediante un alert.
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numA = window.prompt("Indica el radio:");
        let area = Math.PI*Math.pow(numA,2);
        window.alert("Area: "+area);
    }
  };
