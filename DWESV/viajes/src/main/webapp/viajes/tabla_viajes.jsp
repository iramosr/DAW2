<%@ page import="com.daw2.viajes.entity.Viaje" %>
<%@ page import="java.util.List" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="java.text.DateFormat" %>
<%
    List<Viaje> viajes = (List) request.getAttribute("viajes");

%>

<table class="table table-secondary table-striped table-hover align-middle text-start">
    <thead>
    <td class="bg-dark text-white text-center">Codigo</td>
    <td class="bg-dark text-white text-center">Titulo</td>
    <td class="bg-dark text-white">Empleado</td>
    <td class="bg-dark text-white text-center">Precio</td>
    <td class="bg-dark text-white text-center">Salida</td>
    <td class="bg-dark text-white text-center">Llegada</td>
    <td class="bg-dark text-white text-center">Opciones</td>
    </thead>
    <tbody>
    <% for (Viaje viaje : viajes) {
        // Para alternar el color de las filas de la tabla sin tener en cuenta la fila de la descripción
        String bg;
        Long id = viaje.getId();
        if (id % 2 == 0) {
            bg = "table-light";
        } else {
            bg = "table-secondary";
        }

    %>
    <tr class="<%= bg %>">
        <td class="text-center">
            <%= viaje.getCodigo()%>
        </td>
        <td class="text-center">
            <%= viaje.getTitulo()%>
        </td>
        <td>
            <%= viaje.getEmpleado().getNombre() + " " + viaje.getEmpleado().getApellido1()%>
        </td>
        <td class="text-center">
            <%= viaje.getPrecio()%>
        </td>
        <%
            DateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");
            String strSalida = dateFormat.format(viaje.getSalida());
            String strLlegada = dateFormat.format(viaje.getLlegada());
        %>
        <td class="text-center">
            <%= strSalida%>
        </td>
        <td class="text-center">
            <%= strLlegada%>
        </td>
        <td class="text-center">

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

            <a class="btndescripcion link-underline link-underline-opacity-0"
               title="Ver descripción del viaje <%=viaje.getTitulo()%>">
                <button class="btn btn-success text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-comment-dots" style="color: #000000;"></i>
                </button>
            </a>
        </td>
    </tr>
    <tr class="trDescripcion table-success" style="display: none">
        <td colspan="8">
            <%= viaje.getDescripcion()%>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
