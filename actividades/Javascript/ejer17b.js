/*
Crear un documento HTML (ejer17js.html) en el que se incluya un documento Javascript (ejer17.js) 
externo que realice el siguiente proceso:
El programa debe leer la calificación de 10 alumnos en una asignatura. Al finalizar debe mostrar la 
nota media
-Modificar el ejercicio anterior para que muestre también, el porcentaje de aprobados y suspensos
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let total = 0;
        let aprobados = 0;
        let suspensos = 0;
        for (let index = 1; index <= 10; index++) {
            let nota = parseFloat(window.prompt('Ve indicando notas ( '+index+' )'));
            total += nota;
            if(nota >= 5){
                aprobados++;
            }
            else{
                suspensos++;
            }
        }
        media = (total/10);
        porAprobados = (aprobados/10)*100;
        porSuspensos = (suspensos/10)*100;
        document.getElementById('main').innerHTML = 'nota Media: '+media+"<br/>% aprobados "+porAprobados+" %<br/>% suspensos "+porSuspensos+" %";
    }
  };