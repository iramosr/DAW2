<%@ page import="com.daw2.ejerciciojsp1.entity.Empleado" %>
<%@ page import="java.util.List" %>
<%
    List<Empleado> empleados = (List) request.getAttribute("empleados");
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
    <%for(Empleado empleado: empleados){%>
    <tr>
        <td class="bg-dark text-white"><%= empleado.getNif()%></td>
        <td class="bg-dark text-white"><%= empleado.getEmail()%></td>
        <td class="bg-dark text-white"><%= empleado.getNombre()%></td>
        <td class="bg-dark text-white"><%= empleado.getApellido1()%></td>
        <td class="bg-dark text-white"><%= empleado.getApellido2()%></td>
        <td class="bg-dark text-white">
            <a href="empleados/borrar?id=<%=empleado.getId()%>"
               class="rounded bg-danger text-white px-1 me-1 small link-underline link-underline-opacity-0">
                BORRAR
            </a>
            <a href="empleados/ver?id=<%=empleado.getId()%>"
               class="rounded bg-info text-white px-1 small me-1 link-underline link-underline-opacity-0">
                VER
            </a>
            <a href="empleados/actualizar?id=<%=empleado.getId()%>"
               class="rounded bg-warning text-white px-1 small link-underline link-underline-opacity-0">
                ACTUALIZAR
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
