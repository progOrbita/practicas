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
        let numA = window.prompt("Un numero:");
        let numB = window.prompt("Otro numero:");
        let calculations = 
        numA+" + "+numB +" = "+(numA+numB)+"\n"+
        numA+" * "+numB +" = "+(numA*numB)+"\n"+
        numA+" / "+numB +" = "+(numA/numB)+"\n"+
        numA+" % "+numB +" = "+(numA%numB);
        window.alert(calculations);
    }
  };
