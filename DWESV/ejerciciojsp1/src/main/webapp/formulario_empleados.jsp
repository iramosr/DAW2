<%@ page import="com.daw2.ejerciciojsp1.entity.Empleado" %>
<%@ page import="java.util.List" %>
<%@ page import="com.daw2.ejerciciojsp1.entity.Viaje" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%

    List<Viaje> viajes = (List) request.getAttribute("viajes");

    Empleado empleado = (Empleado) request.getAttribute("empleado");
    String readonly = request.getParameter("readonly");
    String mostrarboton = request.getParameter("mostrarboton");
    String required = request.getParameter("required");
    if (empleado == null) {
        empleado = new Empleado();
    }
    String id = empleado.getId() != null ? String.valueOf(empleado.getId()) : "";
    String nif = empleado.getNif() != null ? empleado.getNif() : "";
    String email = empleado.getEmail() != null ? empleado.getEmail() : "";
    String nombre = empleado.getNombre() != null ? empleado.getNombre() : "";
    String apellido1 = empleado.getApellido1() != null ? empleado.getApellido1() : "";
    String apellido2 = empleado.getApellido2() != null ? empleado.getApellido2() : "";
%>
<link type="text/css" rel="stylesheet" href="assets/main.css">

<input type="hidden" name="id" value="<%=id%>">

<div class="card m-2">
    <div class="card-header text-center fw-bold">
        Empleado
    </div>
    <div class="card-body bg-light-subtle">
        <div class="row mb-3">
            <div class="col-12 col-md-6 form-floating">
                <input type="nif" class="form-control" id="nif" name="nif" placeholder="Introduce el NIF"
                       value="<%=nif%>" <%=readonly%> <%=required%>>
                <label for="nif">NIF</label>
            </div>
            <div class="col-12 col-md-6 form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce el email"
                       value="<%=email%>" <%=readonly%> <%=required%>>
                <label for="email">Email</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-4 form-floating">
                <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre"
                       value="<%=nombre%>" <%=readonly%> <%=required%>>
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido1" class="form-control" id="apellido1" name="apellido1"
                       placeholder="Introduce el primer apellido" value="<%=apellido1%>" <%=readonly%> <%=required%>>
                <label for="apellido1">Apellido 1</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido2" class="form-control" id="apellido2" name="apellido2"
                       placeholder="Introduce el segundo apellido" value="<%=apellido2%>"<%=readonly%>>
                <label for="apellido2">Apellido 2</label>
            </div>
        </div>

        <!-- Aquí se muestra un boton que muestra una tabla con todos los viajes del empleado si es que tiene alguno -->
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
            if (viajes != null && viajes.isEmpty() != true) {
        %>
        <table id="tablaViajes" class="table table-secondary table-striped table-hover align-middle text-center"
               style="display: none;">
            <thead>
            <td class="bg-dark text-white">Codigo</td>
            <td class="bg-dark text-white">Título</td>
            <td class="bg-dark text-white">Salida</td>
            <td class="bg-dark text-white">Llegada</td>
            </thead>
            <tbody>
            <%for (Viaje viaje : viajes) {%>
            <tr>
                <td>
                    <%= viaje.getCodigo()%>
                </td>
                <td>
                    <%= viaje.getTitulo()%>
                </td>
                <td>
                    <%= new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").format(viaje.getSalida())%>
                </td>
                <td>
                    <%= new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").format(viaje.getLlegada())%>
                </td>
            </tr>
            <%}%>
            </tbody>
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

<script>
    document.getElementById('btnMostrarViajes').addEventListener('click', function () {
        let tabla = document.getElementById('tablaViajes');
        console.log(tabla);
        if (tabla.style.display === 'none') {
            tabla.style.display = 'table'; // Muestra la tabla
        } else {
            tabla.style.display = 'none'; // Oculta la tabla
        }
    });
</script>