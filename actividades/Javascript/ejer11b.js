/*
Crear un documento HTML (ejer11b.js.html) en el que se incluya un documento Javascript
(ejer11b.js) externo que realice el siguiente proceso:
El programa debe leer un día del mes (1..31) y un mes (1..12) para mostrar a continuación el signo del 
zodiaco correspondiente a ese día/mes.
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let dia = window.prompt("indica el dia");
        let mes = window.prompt("indica el mes");
        if(dia > 31 || mes > 12){
            window.alert('pon valores correctos');
            return;
        }
        if(dia >= 21 && mes == 1 || dia <= 18 && mes == 2){
            window.alert('Tu signo es Acuario');
        }
        if(dia >= 19 && mes == 2 || dia <= 20 && mes == 3){
            window.alert('Tu signo es Piscis');
        }
        if(dia >= 21 && mes == 3 || dia <= 19 && mes == 4){
            window.alert('Tu signo es Aries');
        }
        if(dia >= 20 && mes == 4 || dia <= 20 && mes == 5){
            window.alert('Tu signo es Tauro');
        }
        if(dia >= 21 && mes == 5 || dia <= 20 && mes == 6){
            window.alert('Tu signo es Geminis');
        }
        if(dia >= 21 && mes == 6 || dia <= 22 && mes == 7){
            window.alert('Tu signo es Cancer');
        }
        if(dia >= 23 && mes == 7 || dia <= 22 && mes == 8){
            window.alert('Tu signo es Leo');
        }
        if(dia >= 23 && mes == 8 || dia <= 22 && mes == 9){
            window.alert('Tu signo es Virgo');
        }
        if(dia >= 23 && mes == 9 || dia <= 22 && mes == 10){
            window.alert('Tu signo es Libra');
        }
        if(dia >= 23 && mes == 10 || dia <= 21 && mes == 11){
            window.alert('Tu signo es Escorpio');
        }
        if(dia >= 22 && mes == 11 || dia <= 21 && mes == 12){
            window.alert('Tu signo es Sagitario');
        }
        if(dia >= 22 && mes == 12 || dia <=20 && mes == 1){
            window.alert('Tu signo es Capricornio');
        }
    }
  };
