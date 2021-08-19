/*
Crear un documento HTML (ejer19js.html) en el que se incluya un documento Javascript (ejer19.js) 
externo que realice el siguiente proceso:
El programa debe permitirnos contestar la tabla de multiplicar de un número. Podemos resolverlo 
utilizando cualquiera de las estructuras iterativas comentadas.
1º) Nos pedirá el número de la tabla que queremos hacer
2º) Nos comenzará a preguntar la tabla. Hasta que fallemos o terminemos
3º) Cuando fallemos o terminemos, nos dirá el número de aciertos que hemos tenido
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numero = window.prompt('Un numero para indicar la tabla');
        let aciertos = 0;
        for (let index = 1; index; index++) {
            let respuesta = window.prompt(numero+" x "+index);
            if(respuesta != (numero*index)){
                window.alert('Has tenido '+aciertos+ " aciertos");
                return;
            }
            else{
                aciertos++;
            }
        }
    }
  };