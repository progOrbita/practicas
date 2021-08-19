/*
Crear un documento HTML (ejer11js.html) en el que se incluya un documento Javascript (ejer11.js) 
externo que realice el siguiente proceso:
El programa debe leer un día del mes (1..31) y un mes (1..12) para mostrar a continuación la estación 
del año en la que nos encontramos
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let dia = window.prompt("dia del año");
        let mes = window.prompt("mes del año");
        if(dia > 1 && mes == 1 || dia <= 20 && mes <= 3 || dia >= 22 && mes >= 11){
            window.alert('tamos en invierno');
            return;
        }
        if(dia >= 20 && mes == 3 || dia <= 21 && mes <= 6){
            window.alert('tamos en primavera');
            return;
        }
        if(dia >= 22 && mes == 6 || dia <= 21 && mes <= 9){
            window.alert('tamos en verano');
            return;
        }
        if(dia >= 22 && mes == 9 || dia <= 21 && mes <= 11){
            window.alert('tamos en otoño');
            return;
        }
    }
  };
