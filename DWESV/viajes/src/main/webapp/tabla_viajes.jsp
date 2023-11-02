<%@ page import="com.daw2.viajes.entity.Viaje" %>
<%@ page import="java.util.List" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%
    List<Viaje> viajes = (List) request.getAttribute("viajes");
%>

<table class="table table-info table-striped table-hover align-middle text-center">
    <thead>
    <td class="bg-dark text-white">Codigo</td>
    <td class="bg-dark text-white">Titulo</td>
    <td class="bg-dark text-white">Empleado</td>
    <td class="bg-dark text-white">Precio</td>
    <td class="bg-dark text-white">Salida</td>
    <td class="bg-dark text-white">Llegada</td>
    <td class="bg-dark text-white">Descripcion</td>
    <td class="bg-dark text-white">Opciones</td>
    </thead>
    <tbody>
    <%for (Viaje viaje : viajes) {%>
    <tr>
        <td class="bg-dark text-white"><%= viaje.getCodigo()%>
        </td>
        <td class="bg-dark text-white"><%= viaje.getTitulo()%>
        </td>
        <td class="bg-dark text-white"><%= viaje.getEmpleado().getNombre() + " " + viaje.getEmpleado().getApellido1()%>
        </td>
        <td class="bg-dark text-white"><%= viaje.getPrecio()%>
        </td>
        <td class="bg-dark text-white"><%= new SimpleDateFormat("dd/MM/yyyy HH:mm:ss").format(viaje.getSalida())%>
        </td>
        <td class="bg-dark text-white"><%= new SimpleDateFormat("dd/MM/yyyy HH:mm:ss").format(viaje.getLlegada())%>
        </td>
        <td class="bg-dark text-white"><%= viaje.getDescripcion()%>
        </td>
        <td class="bg-dark text-white">

            <a href="viajes/ver?id=<%=viaje.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Consultar el viaje <%=viaje.getTitulo()%>">
                <button class="btn btn-info text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>

            <a href="viajes/actualizar?id=<%=viaje.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Modificar el viaje <%=viaje.getTitulo()%>">
                <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                </button>
            </a>

            <a href="viajes/borrar?id=<%=viaje.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Eliminar el viaje <%=viaje.getTitulo()%>">
                <button class="btn btn-danger text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
