<%@ page import="com.daw2.ejerciciojsp1.entity.Empleado" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Empleado empleado = (Empleado) request.getAttribute("empleado");
    String readonly = request.getParameter("readonly");
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
        Nuevo Empleado
    </div>
    <div class="card-body bg-light-subtle">
        <div class="row mb-3">
            <div class="col-12 col-md-6 form-floating">
                <input type="nif" class="form-control" id="nif" name="nif" placeholder="Introduce el NIF"
                       value="<%=nif%>" <%=readonly%>>
                <label for="nif">NIF</label>
            </div>
            <div class="col-12 col-md-6 form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce el email"
                       value="<%=email%>" <%=readonly%>>
                <label for="email">Email</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-4 form-floating">
                <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre"
                       value="<%=nombre%>" <%=readonly%>>
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido1" class="form-control" id="apellido1" name="apellido1"
                       placeholder="Introduce el primer apellido" value="<%=apellido1%>" <%=readonly%>>
                <label for="apellido1">Apellido 1</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido2" class="form-control" id="apellido2" name="apellido2"
                       placeholder="Introduce el segundo apellido" value="<%=apellido2%>"<%=readonly%>>
                <label for="apellido2">Apellido 2</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <input class="btn btn-dark float-end" name="btGuardar" type="submit"
               value="<%=request.getParameter("titleSubmit")%>"/><br>
    </div>
</div>

