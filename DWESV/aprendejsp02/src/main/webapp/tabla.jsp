<%@ page import="com.daw2.aprendejsp02.entity.Encuesta" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%
    List <Encuesta> encuestas = (List) request.getAttribute("encuestas");
%>

<table class="table table-info table-striped table-hover">
    <thead>
    <td class="bg-dark text-white">Nif</td>
    <td class="bg-dark text-white">Nombre</td>
    <td class="bg-dark text-white">Primer Apellido</td>
    <td class="bg-dark text-white">Segundo Apellido</td>
    <td class="bg-dark text-white"></td>
    </thead>
    <tbody>
    <%for(Encuesta encuesta: encuestas){%>
        <tr>
            <td class="bg-dark text-white"><%= encuesta.getNif()%></td>
            <td class="bg-dark text-white"><%= encuesta.getNombre()%></td>
            <td class="bg-dark text-white"><%= encuesta.getApellido1()%></td>
            <td class="bg-dark text-white"><%= encuesta.getApellido2()%></td>
            <td class="bg-dark text-white">
                <a href="encuestas/borrar?id=<%=encuesta.getId()%>"
                   class="rounded bg-danger text-white px-1 me-1 small link-underline link-underline-opacity-0">
                    BORRAR
                </a>
                <a href="encuestas/ver?id=<%=encuesta.getId()%>"
                   class="rounded bg-info text-white px-1 small me-1 link-underline link-underline-opacity-0">
                    VER
                </a>
                <a href="encuestas/actualizar?id=<%=encuesta.getId()%>"
                   class="rounded bg-warning text-white px-1 small link-underline link-underline-opacity-0">
                    ACTUALIZAR
                </a>
            </td>
        </tr>
    <%}%>
    </tbody>
</table>
