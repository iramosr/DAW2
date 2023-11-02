<%@ page import="com.daw2.viajes.entity.Contratacion" %>
<%@ page import="com.daw2.viajes.entity.Viaje" %>
<%@ page import="com.daw2.viajes.entity.Cliente" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="java.util.List" %>
<%@ page import="com.daw2.viajes.dao.impl.ViajesDaoImpl" %>
<%@ page import="com.daw2.viajes.dao.ViajesDao" %>
<%@ page import="com.daw2.viajes.dao.impl.ClientesDaoImpl" %>
<%@ page import="com.daw2.viajes.dao.ClientesDao" %>
<%@ page import="java.util.Objects" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Contratacion contratacion = (Contratacion) request.getAttribute("contratacion");
    String readonly = request.getParameter("readonly");
    String disabled = request.getParameter("disabled");
    String required = request.getParameter("required");
    if (contratacion == null) {
        contratacion = new Contratacion();
    }
    String id = contratacion.getId() != null ? String.valueOf(contratacion.getId()) : "";
    String pagado = contratacion.getPagado() != null ? String.valueOf(contratacion.getPagado()) : "";

    ViajesDao viajesDao = new ViajesDaoImpl();
    List<Viaje> viajes = viajesDao.findAll();
    ClientesDao clientesDao = new ClientesDaoImpl();
    List<Cliente> clientes = clientesDao.findAll();

    //averiguar que viaje es el que ha contratado el cliente
    Viaje viajeContr = contratacion.getViaje();
    String viajeId = viajeContr != null ? String.valueOf(viajeContr.getId()) : "";
    //averiguar que cliente es el que ha contratado el viaje
    Cliente clienteContr = contratacion.getCliente();
    String clienteId = clienteContr != null ? String.valueOf(clienteContr.getId()) : "";
%>

<link type="text/css" rel="stylesheet" href="assets/main.css">

<div class="card m-2">
    <input type="hidden" name="id" value="<%=id%>">
    <div class="card m-2">
        <div class="card-header text-center fw-bold">
            Contratación
        </div>
        <div class="card-body bg-light-subtle">
            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <select class="form-select" id="viaje" name="viaje" <%=disabled%> <%=required%>>

                        <option value="0" <% if (viajeId == "") { %>
                                selected
                                <% } %>>
                            Seleccione un viaje
                        </option>
                        <% for (Viaje viaje : viajes) { %>
                        <option value="<%=viaje.getId()%>" <%if (Objects.equals(viajeId, viaje.getId().toString())) { %>
                                selected
                                <% } %>>
                            <%=viaje.getCodigo() + " " + viaje.getTitulo()%>
                        </option>
                        <%}%>
                    </select>
                    <label for="viaje">Selecciona un viaje</label>

                    <input type="hidden" name="viaje" value="<%=viajeId%>" />
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <select class="form-select" id="cliente" name="cliente" <%=disabled%> <%=required%>>

                        <option value="0" <% if (clienteId == "") { %>
                                selected
                                <% } %>>
                            Seleccione un cliente
                        </option>
                        <% for (Cliente cliente : clientes) { %>
                        <option value="<%=cliente.getId()%>" <%if (Objects.equals(clienteId, cliente.getId().toString())) { %>
                                selected
                                <% } %>>
                            <%=cliente.getNombre() + " " + cliente.getApellido1()%>
                        </option>
                        <%}%>
                    </select>
                    <label for="cliente">Selecciona un cliente</label>

                    <input type="hidden" name="cliente" value="<%=clienteId%>" />
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="pagado" class="form-control" id="pagado" name="pagado"
                           placeholder="Introduce la cantidad pagada" value="<%=pagado%>"<%=readonly%> <%=required%>>
                    <label for="pagado">Pagado</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <input class="btn btn-dark float-end" name="btGuardar" type="submit"
               value="<%=request.getParameter("titleSubmit")%>"/><br>
    </div>
</div>