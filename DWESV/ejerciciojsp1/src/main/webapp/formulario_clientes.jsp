<%@ page import="com.daw2.ejerciciojsp1.entity.Cliente" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Cliente cliente = (Cliente) request.getAttribute("cliente");
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
<link type="text/css" rel="stylesheet" href="assets/main.css">

<input type="hidden" name="id" value="<%=id%>">

<div class="card m-2">
    <div class="card-header text-center fw-bold">
        Nuevo Cliente
    </div>
    <div class="card-body bg-light-subtle">
        <div class="row mb-3">
            <div class="col-12 col-md-6 form-floating">
                <input type="nif" class="form-control" id="nif" name="nif" placeholder="Introduce el NIF"
                       value="<%=nif%>">
                <label for="nif">NIF</label>
            </div>
            <div class="col-12 col-md-6 form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email"
                       value="<%=email%>">
                <label for="email">Email</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-4 form-floating">
                <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre"
                       value="<%=nombre%>">
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido1" class="form-control" id="apellido1" name="apellido1"
                       placeholder="Introduce tu primer apellido" value="<%=apellido1%>">
                <label for="apellido1">Apellido 1</label>
            </div>
            <div class="col-12 col-md-4 form-floating">
                <input type="apellido2" class="form-control" id="apellido2" name="apellido2"
                       placeholder="Introduce tu segundo apellido" value="<%=apellido2%>">
                <label for="apellido2">Apellido 2</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <input class="btn btn-dark float-end" name="btGuardar" type="submit"
               value="<%=request.getParameter("titleSubmit")%>"/><br>
    </div>
</div>

