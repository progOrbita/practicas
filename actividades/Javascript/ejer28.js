/*
Crear un documento HTML (ejer28js.html) en el que se incluya código Javascript que trabaje con una 
matriz de 10 números enteros. Se trata de:
 leer la matriz, 
 incrementar los elementos con un incremento específico y
 visualizar la matriz por pantalla.
Para ello definiremos las siguientes funciones:
function leeMatriz(m)
Leerá, mediante un bucle, los 10 elementos de la matriz. 
function incrementaMatriz(m,inc)
Recorrerá la matriz incrementando cada valor de lsa matriz con el valor inc.
function muestraMatriz(m)
Mostrará por pantalla (en el documento) todos los elementos de la matriz separados por 
con espacios en blanco.
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        function leeMatriz(matriz){
            for (let index = 0; index < matriz.length; index++) {
                document.getElementById('main').innerHTML += matriz[index]+" ";
                
            }
        }
        let matriz = [1,2,3,4,5,6,7,8,9,10];
    }
  };