/*
Crear un documento HTML (ejer02js.html) en el que se incluya un documento Javascript (ejer02.js) 
externo que realice el siguiente proceso:
1º) Pedir dos valores numéricos enteros por teclado (a y b). Los leeremos utilizando la función 
prompt.
2º) Mostrar en una ventana de alerta (alert):
a. La suma de los dos números
b. El producto de los dos números
c. La división de a entre b
d. El resto de dividir a entre b
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let cantidad = window.prompt("Indica la cantidad:");
        let precio = window.prompt("Indica el precio/unidad:");
        let porcentaje = window.prompt("Indica el porcentaje de descuento");
        let total;

        total = (cantidad*precio)-((cantidad*precio)*(porcentaje/100));
        window.alert("importe neto: "+total);
    }
  };
