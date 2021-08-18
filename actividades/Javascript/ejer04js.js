/*
Crear un documento HTML (ejer04js.html) en el que se incluya un documento Javascript (ejer04.js) 
externo que realice el siguiente proceso:
A partir de la unidades vendidas de un producto, su precio unitario y un porcentaje de descuento (0 .. 
100) calcularemos el importe neto de la venta.
1º) Leemos las unidades vendidas con un prompt.
2º) Leemos el precio unitario.
3º) Leemos el porcentaje de descuento. Será un valor entero comprendido entre 0 y 100
4º) Calcularemos el importe neto
5º) Mostramos el resultado en el documento
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let cantidad = window.prompt("Indica la cantidad:");
        let precio = window.prompt("Indica el precio/unidad:");
        let porcentaje = window.prompt("Indica el porcentaje de descuento");
        if(porcentaje > 100){
            window.alert('te has pasado, fuera de esta tienda');
            return;
        }
        let total;

        total = (cantidad*precio)-((cantidad*precio)*(porcentaje/100));
        window.alert("importe neto: "+total);
    }
  };
