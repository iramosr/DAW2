<%@ page import="com.daw2.ejerciciojsp1.entity.Viaje" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Viaje viaje = (Viaje) request.getAttribute("viaje");
    if (viaje == null) {
        viaje = new Viaje();
    }
    String id = viaje.getId() != null ? String.valueOf(viaje.getId()) : "";
    String codigo = viaje.getCodigo() != null ? viaje.getCodigo() : "";
    String descripcion = viaje.getDescripcion() != null ? viaje.getDescripcion() : "";
    String precio = viaje.getPrecio() != null ? String.valueOf(viaje.getPrecio()) : "";
    String salida = viaje.getSalida() != null ? new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").format(viaje.getSalida()) : "";
    String llegada = viaje.getLlegada() != null ? new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").format(viaje.getSalida()) : "";
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
                           placeholder="Introduce el codigo" value="<%=codigo%>">
                    <label for="codigo">Código</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input type="descripcion" class="form-control" id="descripcion" name="descripcion"
                           placeholder="Introduce la descripción" value="<%=descripcion%>">
                    <label for="descripcion">Descripción</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="precio" class="form-control" id="precio" name="precio"
                           placeholder="Introduce el precio" value="<%=precio%>">
                    <label for="precio">Precio</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="salida" class="form-control" id="salida" name="salida"
                           placeholder="Introduce la salida" value="<%=salida%>">
                    <label for="salida">Salida</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="llegada" class="form-control" id="llegada" name="llegada"
                           placeholder="Introduce la llegada" value="<%=llegada%>">
                    <label for="llegada">Llegada</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <input class="btn btn-dark float-end" name="btGuardar" type="submit"
               value="<%=request.getParameter("titleSubmit")%>"/><br>
    </div>
</div>