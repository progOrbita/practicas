/*
Crear un documento HTML (ejer08.html) en el que se incluya un documento Javascript (ejer08.js) externo que realice el siguiente proceso:
En un almacén se hace un 20% de descuento a los clientes cuya compra supere los 1000€ 
¿Cuál será la cantidad que pagará una persona por su compra?
1º) Leemos una cantidad numérica llamada importe
2º) Si el importe es superior a 1000€ calculamos el 20% de descuento. En caso contrario el descuento es 0
3º) Mostramos el importe a pagar una vez descontado el descuento
*/
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        let importe = window.prompt("Cuanto vas a pagar");
        let final;
        if(importe > 1000){
           final = importe-(importe*0.2);
        }
        else{
            final = importe;
        }
        window.alert("Te toca pagar "+final+" en moneda imaginaria");

    }
  };
