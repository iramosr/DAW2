<%@ page import="com.daw2.ejerciciojsp1.entity.Viaje" %>
<%@ page import="com.daw2.ejerciciojsp1.entity.Empleado" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="java.util.List" %>
<%@ page import="com.daw2.ejerciciojsp1.dao.impl.EmpleadosDaoImpl" %>
<%@ page import="com.daw2.ejerciciojsp1.dao.EmpleadosDao" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Viaje viaje = (Viaje) request.getAttribute("viaje");
    String readonly = request.getParameter("readonly");
    String disabled = request.getParameter("disabled");
    if (viaje == null) {
        viaje = new Viaje();
    }
    String id = viaje.getId() != null ? String.valueOf(viaje.getId()) : "";
    String codigo = viaje.getCodigo() != null ? viaje.getCodigo() : "";
    String precio = viaje.getPrecio() != null ? String.valueOf(viaje.getPrecio()) : "";
    String salida = viaje.getSalida() != null ? new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").format(viaje.getSalida()) : "";
    String llegada = viaje.getLlegada() != null ? new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").format(viaje.getSalida()) : "";
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
            Nuevo Viaje
        </div>
        <div class="card-body bg-light-subtle">
            <div class="row mb-3">
                <div class="col-12 col-md-6 form-floating">
                    <input type="codigo" class="form-control" id="codigo" name="codigo"
                           placeholder="Introduce el codigo" value="<%=codigo%>"<%=readonly%>>
                    <label for="codigo">Código</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <select class="form-select" id="empleado" name="empleado"
                            aria-label="floating label select example" <%=disabled%>>

                        <option <% if (empleadoId == "") { %>
                                selected
                                <% } %>>
                            Encargado
                        </option>
                        <% for (Empleado empleado : empleados) { %>
                        <option value="<%=empleado.getId()%>" <%if (Long.parseLong(empleadoId) == empleado.getId()) { %>
                                selected
                                <% } %>>
                            <%=empleado.getNombre() + " " + empleado.getApellido1() + " " + empleado.getApellido2()%>
                        </option>
                        <%}%>
                    </select>
                    <label for="empleado">Empleado</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="precio" class="form-control" id="precio" name="precio"
                           placeholder="Introduce el precio" value="<%=precio%>"<%=readonly%>>
                    <label for="precio">Precio</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="salida" class="form-control" id="salida" name="salida"
                           placeholder="Introduce la salida" value="<%=salida%>"<%=readonly%>>
                    <label for="salida">Salida</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="llegada" class="form-control" id="llegada" name="llegada"
                           placeholder="Introduce la llegada" value="<%=llegada%>"<%=readonly%>>
                    <label for="llegada">Llegada</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-floating">
                    <textarea type="descripcion" class="form-control" id="descripcion" name="descripcion"
                              placeholder="Introduce la descripción" <%=readonly%>><%=descripcion%></textarea>
                    <label for="descripcion">Descripción</label>
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <input class="btn btn-dark float-end" name="btGuardar" type="submit"
               value="<%=request.getParameter("titleSubmit")%>"/><br>
    </div>
</div>