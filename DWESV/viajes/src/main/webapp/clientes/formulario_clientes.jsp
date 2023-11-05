<%@ page import="com.daw2.viajes.entity.Cliente" %>
<%@ page import="java.util.List" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="com.daw2.viajes.entity.Contratacion" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    double totalpagado = 0;
    double totalsinpagar = 0;

    List<Contratacion> contrataciones = (List) request.getAttribute("contrataciones");
    String mostrarboton;
    if ((contrataciones == null) || (contrataciones.isEmpty())) {
        mostrarboton = "";
    } else {
        mostrarboton = request.getParameter("mostrarboton");
    }

    Cliente cliente = (Cliente) request.getAttribute("cliente");
    String readonly = request.getParameter("readonly");
    String required = request.getParameter("required");
    if (cliente == null) {
        cliente = new Cliente();
    }
    String id = cliente.getId() != null ? String.valueOf(cliente.getId()) : "";
    String nif = cliente.getNif() != null ? cliente.getNif() : "";
    String email = cliente.getEmail() != null ? cliente.getEmail() : "";
    String nombre = cliente.getNombre() != null ? cliente.getNombre() : "";
    String apellido1 = cliente.getApellido1() != null ? cliente.getApellido1() : "";
    String apellido2 = cliente.getApellido2() != null ? cliente.getApellido2() : "";
%>
<link type="text/css" rel="stylesheet" href="../assets/main.css">

<input type="hidden" name="id" value="<%=id%>">

<div class="card m-2">
    <div class="card-header text-center fw-bold">
        Cliente
    </div>
    <div class="card-body bg-light-subtle">
        <div class="row mb-3">
            <div class="col-12 col-md-6 form-floating">
                <input type="nif" class="form-control" id="nif" name="nif" placeholder="Introduce el NIF"
                       value="<%=nif%>" <%=readonly%> <%=required%>>
                <label for="nif">NIF</label>
            </div>
            <div class="col-12 col-md-6 form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email"
                       value="<%=email%>" <%=readonly%> <%=required%>>
                <label for="email">Email</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-4 form-floating">
                <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre"
                       value="<%=nombre%>" <%=readonly%> <%=required%>>
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido1" class="form-control" id="apellido1" name="apellido1"
                       placeholder="Introduce tu primer apellido" value="<%=apellido1%>" <%=readonly%> <%=required%>>
                <label for="apellido1">Primer apellido</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido2" class="form-control" id="apellido2" name="apellido2"
                       placeholder="Introduce tu segundo apellido" value="<%=apellido2%>"<%=readonly%>>
                <label for="apellido2">Segundo apellido</label>
            </div>
        </div>
        <!-- Aquí se muestra un boton que muestra una tabla con todos los viajes del cliente si es que tiene alguno -->
        <%
            // Verifica el parámetro mostrarBoton
            if (mostrarboton != null && mostrarboton.equals("mostrarboton")) {
        %>
        <button id="btnMostrarViajes" type="button" class="btn btn-info text-center" style="width: 40px; height: 40px"
                title="Mostrar viajes">
            <i class="fa-solid fa-plane" style="color: #ffffff;"></i>
        </button>
        <%
            }
        %>

        <%
            // Verifica el parámetro mostrarBoton
            if (contrataciones != null && contrataciones.isEmpty() != true) {
        %>
        <table id="tablaViajes" class="table table-secondary table-striped table-hover align-middle text-center"
               style="display: none;">
            <thead>
            <td class="bg-dark text-white">Codigo</td>
            <td class="bg-dark text-white">Título</td>
            <td class="bg-dark text-white">Salida</td>
            <td class="bg-dark text-white">Llegada</td>
            <td class="bg-dark text-white">Pagado</td>
            <td class="bg-dark text-white">A pagar</td>
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
                    <%= new SimpleDateFormat("dd/MM/yyyy HH:mm:ss").format(contratacion.getViaje().getSalida())%>
                </td>
                <td>
                    <%= new SimpleDateFormat("dd/MM/yyyy HH:mm:ss").format(contratacion.getViaje().getLlegada())%>
                </td>
                <td>
                    <% totalpagado += contratacion.getPagado(); %>
                    <%= Math.round(contratacion.getPagado()* 100.0) / 100.0%>
                </td>
                <td>
                    <% totalsinpagar += contratacion.getViaje().getPrecio() - contratacion.getPagado(); %>
                    <%= Math.round((contratacion.getViaje().getPrecio() - contratacion.getPagado())* 100.0) / 100.0%>
                </td>
            </tr>
            <%}%>
            </tbody>
            <tfoot class="table-info">
            <tr>
                <td colspan="4" class="text-start fw-bold">Total</td>
                <td class="fw-bold">
                    <%= Math.round(totalpagado* 100.0) / 100.0 %>
                </td>
                <td class="fw-bold">
                    <%= Math.round(totalsinpagar* 100.0) / 100.0 %>
                </td>
            </tr>
            </tfoot>
        </table>
        <%
            }
        %>
    </div>

    <div class="card-footer">
        <input class="btn btn-dark float-end" name="btGuardar" type="submit"
               value="<%=request.getParameter("titleSubmit")%>"/><br>
    </div>
</div>
