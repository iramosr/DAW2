<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprende JSP</title>
</head>
<body>
<h1>Ejemplo JSP02</h1>
<%
    int edad = 17;
%>
<% if (edad <18){ %>
Menor de edad
<% } else { %>
Mayor de edad
<%} %>


<hr>
<%for (int i= 1; i < 10; i++){%>
Numero: <%=i%> <br>
<%}%>

<hr>

<table>
    <thead>
    <tr>
        <th>Nº</th>
        <th></th>
        <th>Valor</th>
        <th></th>
        <th>Resutado</th>
    </tr>
    </thead>
    <tbody>
    <%for(int i=0; i <=10;i++){%>
    <tr style='<%=i%2==0?"background-color: #c1f6ee":"background-color: #ffff00;"%>'>
        <td style="text-align: center;padding: 5px 10px 5px 10px;">3</td>
        <td style="text-align: center;padding: 5px 10px 5px 10px;">x</td>
        <td style="text-align: center;padding: 5px 10px 5px 10px;"><%=i%></td>
        <td style="text-align: center;padding: 5px 10px 5px 10px;">=</td>
        <td style="text-align: center;padding: 5px 10px 5px 10px;"><%=3*i%></td>
    </tr>
    <%}%>
    </tbody>
</table>


</body>
</html>
