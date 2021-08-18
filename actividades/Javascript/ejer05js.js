/*
Crear un documento HTML (ejer05js.html) en el que se incluya un documento Javascript (ejer05.js) 
externo que realice el siguiente proceso:
1) Leerá un número entero comprendido entre 1 y 9.
2) Mostrará en el documento web una tabla de multiplicar reducida del número especificado
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
