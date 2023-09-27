<%@ page import="com.daw2.ejerciciojsp1.entity.Viaje" %>
<%@ page import="java.util.List" %>
<%
    List<Viaje> viajes = (List) request.getAttribute("viajes");
%>

<table class="table table-info table-striped table-hover">
    <thead>
    <td class="bg-dark text-white">Codigo</td>
    <td class="bg-dark text-white">Descripcion</td>
    <td class="bg-dark text-white">Precio</td>
    <td class="bg-dark text-white">Salida</td>
    <td class="bg-dark text-white">Llegada</td>
    <td class="bg-dark text-white"></td>
    </thead>
    <tbody>
    <%for(Viaje viaje: viajes){%>
    <tr>
        <td class="bg-dark text-white"><%= viaje.getCodigo()%></td>
        <td class="bg-dark text-white"><%= viaje.getDescripcion()%></td>
        <td class="bg-dark text-white"><%= viaje.getPrecio()%></td>
        <td class="bg-dark text-white"><%= viaje.getSalida()%></td>
        <td class="bg-dark text-white"><%= viaje.getLlegada()%></td>
        <td class="bg-dark text-white">
            <a href="viajes/borrar?id=<%=viaje.getId()%>"
               class="rounded bg-danger text-white px-1 me-1 small link-underline link-underline-opacity-0">
                BORRAR
            </a>
            <a href="viajes/ver?id=<%=viaje.getId()%>"
               class="rounded bg-info text-white px-1 small me-1 link-underline link-underline-opacity-0">
                VER
            </a>
            <a href="viajes/actualizar?id=<%=viaje.getId()%>"
               class="rounded bg-warning text-white px-1 small link-underline link-underline-opacity-0">
                ACTUALIZAR
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
