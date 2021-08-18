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
        let numA = window.prompt("Que tabla quieres ver?");
        let texto = 
        `<table>
            <thead>
                <th>i</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </thead>
            <tbody>
                <tr>
                    <td>${numA}*i</td>
                    <td>${numA}</td>
                    <td>${numA*2}</td>
                    <td>${numA*3}</td>
                    <td>${numA*4}</td>
                    <td>${numA*5}</td>
                </tr>
            </body>
        </table>`;
        document.getElementById('main').innerHTML = texto;
    }
  };
