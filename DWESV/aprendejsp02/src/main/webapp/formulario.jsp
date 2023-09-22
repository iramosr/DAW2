<%@ page import="com.daw2.aprendejsp02.entity.Encuesta" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %><%--
  Created by IntelliJ IDEA.
  User: daw2
  Date: 15/09/2023
  Time: 16:55
  To change this template use File | Settings | File Templates.
--%>
<%
    List <Encuesta> encuestas = (List) request.getAttribute("encuestas");
%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<jsp:include page="layouts/head.jsp"/>


<body>
<jsp:include page="layouts/main-menu.jsp"/>
<form action="encuestas/nueva" method="post">
  NIF: <input name="nif" type="text" size="15" maxlength="15"><br>
  Nombre: <input name="nombre" type="text" size="15" maxlength="15"><br>
  Apellido1: <input name="apellido1" type="text" size="15" maxlength="15"><br>
    Apellido2: <input name="apellido2" type="text" size="15" maxlength="15"><br>
  <input name="botGuardar" type="submit" value="Guardar"> <br>
</form>
<table>
    <thead>
    <td>Nif</td>
    <td>Nombre</td>
    <td>Primer Apellido</td>
    <td>Segundo Apellido</td>
    </thead>
    <tbody>
    <%for(Encuesta encuesta: encuestas){%>
        <tr>
            <td><%= encuesta.getNif()%></td>
            <td><%= encuesta.getNombre()%></td>
            <td><%= encuesta.getApellido1()%></td>
            <td><%= encuesta.getApellido2()%></td>
        </tr>
    <%}%>
    </tbody>
</table>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
