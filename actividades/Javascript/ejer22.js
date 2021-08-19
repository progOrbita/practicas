/*
Crear un documento HTML (ejer22js.html) que realice el siguiente proceso:
Se deberán implementar las siguientes funciones:
• triangulo(lado1, lado2, lado3)
Recibe la longitud de los tres lados de un triángulo. Devuelve 1 si es escaleno, 2 si es isósceles y 3 si es equilátero. Ya hecho en clase
• potencia(base, exp)
Recibe dos números, base y exponente. Devuelve la base elevada al exponente (por el método de las multiplicaciones sucesivas). Ya hecho en clase
*/
let a = 1;
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let numA = window.prompt("Un lado del triangulo");
        let numB = window.prompt("Otro lado del triangulo");
        let numC = window.prompt("Y el tercer lado del triangulo");
        if(numA == numB && numB == numC){
            document.getElementById('main').innerHTML += "Triangulo es 3";
        }
        //Si dos lados cualesquiera son iguales.
        else if(numA == numB || numA == numC || numB == numC){
            document.getElementById('main').innerHTML += "Triangulo es 2";
        }
        else{
            document.getElementById('main').innerHTML += "Triangulo es 1";
        }
        let numero = window.prompt('indica el numero para que indique su cuadrado');
        let potencia = window.prompt('indica la potencia del numero');
        let resultado = 1;
        for (let index = 1; index <= potencia; index++) {
                resultado *= numero;
        }
        document.getElementById('main').innerHTML += "<br/>"+numero+" elevado a "+potencia+" es = "+resultado;
    }
  };