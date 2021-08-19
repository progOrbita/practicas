/*
Crear un documento HTML (ejer17js.html) en el que se incluya un documento Javascript (ejer17.js) 
externo que realice el siguiente proceso:
El programa debe leer la calificación de 10 alumnos en una asignatura. Al finalizar debe mostrar la 
nota media
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let total = 0;
        for (let index = 1; index <= 10; index++) {
            let nota = parseFloat(window.prompt('Ve indicando notas ( '+index+' )'));
            total += nota;
        }
        media = (total/10);
        document.getElementById('main').innerHTML = 'nota Media: '+media;
    }
  };