/*
Crear un documento HTML (ejer11js.html) en el que se incluya un documento Javascript (ejer11.js) 
externo que realice el siguiente proceso:
Se trata de hacer un bucle que escriba en una página web los encabezamientos desde <H1> hasta <H6> con un texto que ponga "Encabezado de nivel x".
Lo que deseamos escribir en una página web mediante Javascript es lo siguiente:
<H1>Encabezado de nivel 1</H1>
<H2>Encabezado de nivel 2</H2>
<H3>Encabezado de nivel 3</H3>
<H4>Encabezado de nivel 4</H4>
<H5>Encabezado de nivel 5</H5>
<H6>Encabezado de nivel 6</H6>
Para ello tenemos que hacer un bucle que empiece en 1 y termine en 6 y en cada iteración escribiremos el encabezado que toca.
*/
let a = 1;
document.onreadystatechange = () => {
    for (let index = 1; index <= 6; index++) {    
        //For some reason it iterates two times, to avoid it.
        if(a > 6){
           return;
        }   
        document.getElementById('main').innerHTML += "<h"+index+">Encabezado de nivel "+index+"</h"+index+">"; 
        a++;      
    }
  };