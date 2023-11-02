<%@ page import="com.daw2.viajes.entity.Cliente" %>
<%@ page import="java.util.List" %>
<%
    List<Cliente> clientes = (List) request.getAttribute("clientes");
%>

<table class="table table-info table-striped table-hover align-middle text-center">
    <thead>
    <td class="bg-dark text-white">Nif</td>
    <td class="bg-dark text-white">Email</td>
    <td class="bg-dark text-white">Nombre</td>
    <td class="bg-dark text-white">Primer Apellido</td>
    <td class="bg-dark text-white">Segundo Apellido</td>
    <th class="bg-dark text-white">Opciones</th>
    </thead>
    <tbody>
    <%for (Cliente cliente : clientes) {%>
    <tr>
        <td class="bg-dark text-white"><%= cliente.getNif()%>
        </td>
        <td class="bg-dark text-white"><%= cliente.getEmail()%>
        </td>
        <td class="bg-dark text-white"><%= cliente.getNombre()%>
        </td>
        <td class="bg-dark text-white"><%= cliente.getApellido1()%>
        </td>
        <td class="bg-dark text-white"><%= cliente.getApellido2()%>
        </td>
        <td class="bg-dark text-white">

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
