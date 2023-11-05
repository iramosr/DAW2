<%@ page import="com.daw2.viajes.entity.Cliente" %>
<%@ page import="java.util.List" %>
<%
    List<Cliente> clientes = (List) request.getAttribute("clientes");
%>

<table class="table table-secondary table-striped table-hover align-middle text-start">
    <thead>
    <td class="bg-dark text-white text-center">Nif</td>
    <td class="bg-dark text-white">Email</td>
    <td class="bg-dark text-white">Nombre</td>
    <td class="bg-dark text-white">Primer Apellido</td>
    <td class="bg-dark text-white">Segundo Apellido</td>
    <th class="bg-dark text-white text-center">Opciones</th>
    </thead>
    <tbody>
    <%for (Cliente cliente : clientes) {%>
    <tr>
        <td class="text-center"><%= cliente.getNif()%>
        </td>
        <td><%= cliente.getEmail()%>
        </td>
        <td><%= cliente.getNombre()%>
        </td>
        <td><%= cliente.getApellido1()%>
        </td>
        <td><%= cliente.getApellido2()%>
        </td>
        <td class="text-center">

            <a href="clientes/ver?id=<%=cliente.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Consultar el cliente <%=cliente.getNombre()%>">
                <button class="btn btn-info text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>
            <a href="clientes/actualizar?id=<%=cliente.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Modificar el cliente <%=cliente.getNombre()%>">
                <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                </button>
            </a>
            <a href="clientes/borrar?id=<%=cliente.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Eliminar el cliente <%=cliente.getNombre()%>">
                <button class="btn btn-danger text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
