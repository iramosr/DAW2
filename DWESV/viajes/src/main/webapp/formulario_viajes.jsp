<%@ page import="com.daw2.viajes.entity.Viaje" %>
<%@ page import="com.daw2.viajes.entity.Empleado" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="java.util.List" %>
<%@ page import="com.daw2.viajes.dao.impl.EmpleadosDaoImpl" %>
<%@ page import="com.daw2.viajes.dao.EmpleadosDao" %>
<%@ page import="java.util.Objects" %>
<%@ page import="com.daw2.viajes.entity.Contratacion" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    double totalingresado = 0;
    double totalsiningresar = 0;

    List<Contratacion> contrataciones = (List) request.getAttribute("contrataciones");

    Viaje viaje = (Viaje) request.getAttribute("viaje");
    String readonly = request.getParameter("readonly");
    String disabled = request.getParameter("disabled");
    String required = request.getParameter("required");
    String mostrarboton = request.getParameter("mostrarboton");
    if (viaje == null) {
        viaje = new Viaje();
    }
    String id = viaje.getId() != null ? String.valueOf(viaje.getId()) : "";
    String codigo = viaje.getCodigo() != null ? viaje.getCodigo() : "";
    String titulo = viaje.getTitulo() != null ? viaje.getTitulo() : "";
    String precio = viaje.getPrecio() != null ? String.valueOf(viaje.getPrecio()) : "";
    String salida = viaje.getSalida() != null ? new SimpleDateFormat("dd/MM/yyyy'T'HH:mm").format(viaje.getSalida()) : "";
    String llegada = viaje.getLlegada() != null ? new SimpleDateFormat("dd/MM/yyyy'T'HH:mm").format(viaje.getLlegada()) : "";
    String descripcion = viaje.getDescripcion() != null ? viaje.getDescripcion() : "";

    EmpleadosDao empleadosDao = new EmpleadosDaoImpl();
    List<Empleado> empleados = empleadosDao.findAll();

    //averiguar que empleado es el encargado del viaje
    Empleado empleadoselec = viaje.getEmpleado();
    String empleadoId = empleadoselec != null ? String.valueOf(empleadoselec.getId()) : "";
%>

<link type="text/css" rel="stylesheet" href="assets/main.css">

<div class="card m-2">
    <input type="hidden" name="id" value="<%=id%>">
    <div class="card m-2">
        <div class="card-header text-center fw-bold">
            Viaje
        </div>
        <div class="card-body bg-light-subtle">
            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="codigo" class="form-control" id="codigo" name="codigo"
                           placeholder="Introduce el codigo" value="<%=codigo%>"<%=readonly%> <%=required%>>
                    <label for="codigo">Código</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="titulo" class="form-control" id="titulo" name="titulo"
                           placeholder="Introduce el titulo" value="<%=titulo%>"<%=readonly%> <%=required%>>
                    <label for="titulo">Título</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <select class="form-select" id="empleado" name="empleado" <%=disabled%> <%=required%>>

                        <option value="0" <% if (empleadoId == "") { %>
                                selected
                                <% } %>>
                            Seleccione un empleado
                        </option>
                        <% for (Empleado empleado : empleados) { %>
                        <option value="<%=empleado.getId()%>" <%if (Objects.equals(empleadoId, empleado.getId().toString())) { %>
                                selected
                                <% } %>>
                            <%=empleado.getNombre() + " " + empleado.getApellido1() + " " + empleado.getApellido2()%>
                        </option>
                        <%}%>
                    </select>
                    <label for="empleado">Empleado</label>

                    <input type="hidden" name="empleado" value="<%=empleadoId%>"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio"
                           placeholder="Introduce el precio" value="<%=precio%>"<%=readonly%> <%=required%>>
                    <label for="precio">Precio</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="datetime-local" class="form-control" id="salida" name="salida"
                           placeholder="Introduce la salida" value="<%=salida%>"<%=readonly%> <%=required%>>
                    <label for="salida">Salida</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="datetime-local" class="form-control" id="llegada" name="llegada"
                           placeholder="Introduce la llegada" value="<%=llegada%>"<%=readonly%> <%=required%>>
                    <label for="llegada">Llegada</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-floating">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Introduce la descripción" <%=readonly%> <%=required%>><%=descripcion%></textarea>
                    <label for="descripcion">Descripción</label>
                </div>
            </div>
            <!-- Aquí se muestra un boton que muestra una tabla con todos los viajes del cliente si es que tiene alguno -->
            <%
                // Verifica el parámetro mostrarBoton
                if (mostrarboton != null && mostrarboton.equals("mostrarboton")) {
            %>
            <button id="btnMostrarClientes" type="button" class="btn btn-info text-center"
                    style="width: 40px; height: 40px"
                    title="Mostrar clientes">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            </button>
            <%
                }
            %>

            <%
                // Verifica el parámetro mostrarBoton
                if (contrataciones != null && contrataciones.isEmpty() != true) {
            %>
            <table id="tablaClientes" class="table table-secondary table-striped table-hover align-middle text-center"
                   style="display: none;">
                <thead>
                <td class="bg-dark text-white">NIF cliente</td>
                <td class="bg-dark text-white">Email</td>
                <td class="bg-dark text-white">Nombre</td>
                <td class="bg-dark text-white">Apellido</td>
                <td class="bg-dark text-white">Ingresado</td>
                <td class="bg-dark text-white">A ingresar</td>
                </thead>
                <tbody>
                <%for (Contratacion contratacion : contrataciones) {%>
                <tr>
                    <td>
                        <%= contratacion.getCliente().getNif()%>
                    </td>
                    <td>
                        <%= contratacion.getCliente().getEmail()%>
                    </td>
                    <td>
                        <%= contratacion.getCliente().getNombre()%>
                    </td>
                    <td>
                        <%= contratacion.getCliente().getApellido1()%>
                    </td>
                    <td>
                        <% totalingresado += contratacion.getPagado(); %>
                        <%= contratacion.getPagado()%>
                    </td>
                    <td>
                        <% totalsiningresar += contratacion.getViaje().getPrecio() - contratacion.getPagado(); %>
                        <%= contratacion.getViaje().getPrecio() - contratacion.getPagado()%>
                    </td>
                </tr>
                <%}%>
                </tbody>
                <tfoot class="table-info">
                <tr>
                    <td colspan="4" class="text-start fw-bold">Total</td>
                    <td class="fw-bold">
                        <%= Math.round(totalingresado * 100.0) / 100.0 %>
                    </td>
                    <td class="fw-bold">
                        <%= Math.round(totalsiningresar * 100.0) / 100.0 %>
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
</div>
<script>
    document.getElementById('btnMostrarClientes').addEventListener('click', function () {
        let tabla = document.getElementById('tablaClientes');
        console.log(tabla);
        if (tabla.style.display === 'none') {
            tabla.style.display = 'table'; // Muestra la tabla
        } else {
            tabla.style.display = 'none'; // Oculta la tabla
        }
    });
</script>