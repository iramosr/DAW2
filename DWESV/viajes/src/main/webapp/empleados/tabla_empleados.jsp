<%@ page import="com.daw2.viajes.entity.Empleado" %>
<%@ page import="java.util.List" %>
<%
    List<Empleado> empleados = (List) request.getAttribute("empleados");
%>

<table class="table table-secondary table-striped table-hover align-middle text-start">
    <thead>
    <td class="bg-dark text-white text-center">Nif</td>
    <td class="bg-dark text-white">Email</td>
    <td class="bg-dark text-white">Nombre</td>
    <td class="bg-dark text-white">Primer Apellido</td>
    <td class="bg-dark text-white">Segundo Apellido</td>
    <td class="bg-dark text-white text-center">Opciones</td>
    </thead>
    <tbody>
    <%for (Empleado empleado : empleados) {%>
    <tr>
        <td class="text-center">
            <%= empleado.getNif()%>
        </td>
        <td>
            <%= empleado.getEmail()%>
        </td>
        <td>
            <%= empleado.getNombre()%>
        </td>
        <td>
            <%= empleado.getApellido1()%>
        </td>
        <td>
            <%= empleado.getApellido2()%>
        </td>
        <td class="text-center">
            <a href="empleados/ver?id=<%=empleado.getId()%>"
               class="link-underline link-underline-opacity-0 text-center"
               title="Consultar el empleado <%=empleado.getNombre()%>">
                <button class="btn btn-info text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>

            <a href="empleados/actualizar?id=<%=empleado.getId()%>"
               class="link-underline link-underline-opacity-0 text-center"
               title="Modificar el empleado <%=empleado.getNombre()%>">
                <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                </button>
            </a>

            <a href="empleados/borrar?id=<%=empleado.getId()%>"
               class="link-underline link-underline-opacity-0 text-center"
               title="Eliminar el empleado <%=empleado.getNombre()%>">
                <button class="btn btn-danger text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
