<%@ page import="com.daw2.viajes.entity.Contratacion" %>
<%@ page import="java.util.List" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%
    List<Contratacion> contrataciones = (List) request.getAttribute("contrataciones");
%>

<table id="tablaContrataciones" class="table table-secondary table-striped table-hover align-middle text-center">
    <thead>
    <td class="bg-dark text-white">Codigo viaje</td>
    <td class="bg-dark text-white">Titulo viaje</td>
    <td class="bg-dark text-white">NIF cliente</td>
    <td class="bg-dark text-white">Cliente</td>
    <td class="bg-dark text-white">Cantidad pagada</td>
    <td class="bg-dark text-white text-center">Opciones</td>
    </thead>
    <tbody>
    <%for (Contratacion contratacion : contrataciones) {%>
    <tr>
        <td>
            <%= contratacion.getViaje().getCodigo()%>
        </td>
        <td>
            <%= contratacion.getViaje().getTitulo()%>
        </td>
        <td>
            <%= contratacion.getCliente().getNif()%>
        </td>
        <td>
            <%=contratacion.getCliente().getNombre() + " " + contratacion.getCliente().getApellido1()%>
        </td>
        <td>
            <%= contratacion.getPagado()%>
        </td>
        <td class="text-center">

            <a href="contrataciones/ver?id=<%=contratacion.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Consultar la contratación de <%=contratacion.getCliente().getNombre() + " " + contratacion.getCliente().getApellido1()%>">
                <button class="btn btn-info text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>

            <a href="contrataciones/actualizar?id=<%=contratacion.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Modificar la contratación de <%=contratacion.getCliente().getNombre() + " " + contratacion.getCliente().getApellido1()%>">
                <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                </button>
            </a>

            <a href="contrataciones/borrar?id=<%=contratacion.getId()%>"
               class="link-underline link-underline-opacity-0"
               title="Eliminar la contratación de <%=contratacion.getCliente().getNombre() + " " + contratacion.getCliente().getApellido1()%>">
                <button class="btn btn-danger text-center" style="width: 40px; height: 40px">
                    <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                </button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>
</table>
