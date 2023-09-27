<%@ page import="com.daw2.ejerciciojsp1.entity.Cliente" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%
    List<Cliente> clientes = (List) request.getAttribute("clientes");
%>

<table class="table table-info table-striped table-hover">
    <thead>
    <td class="bg-dark text-white">Nif</td>
    <td class="bg-dark text-white">Email</td>
    <td class="bg-dark text-white">Nombre</td>
    <td class="bg-dark text-white">Primer Apellido</td>
    <td class="bg-dark text-white">Segundo Apellido</td>
    <td class="bg-dark text-white"></td>
    </thead>
    <tbody>
    <%for(Cliente cliente: clientes){%>
    <tr>
        <td class="bg-dark text-white"><%= cliente.getNif()%></td>
        <td class="bg-dark text-white"><%= cliente.getEmail()%></td>
        <td class="bg-dark text-white"><%= cliente.getNombre()%></td>
        <td class="bg-dark text-white"><%= cliente.getApellido1()%></td>
        <td class="bg-dark text-white"><%= cliente.getApellido2()%></td>
        <td class="bg-dark text-white">
            <a href="clientes/borrar?id=<%=cliente.getId()%>"
               class="rounded bg-danger text-white px-1 me-1 small link-underline link-underline-opacity-0">
                BORRAR
            </a>
            <a href="clientes/ver?id=<%=cliente.getId()%>"
               class="rounded bg-info text-white px-1 small me-1 link-underline link-underline-opacity-0">
                VER
            </a>
            <a href="clientes/actualizar?id=<%=cliente.getId()%>"
               class="rounded bg-warning text-white px-1 small link-underline link-underline-opacity-0">
                ACTUALIZAR
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
