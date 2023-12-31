<%@ page import="com.daw2.aprendejsp02.entity.Encuesta" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Encuesta encuesta = (Encuesta) request.getAttribute("encuesta");
    String readonly = request.getParameter("readonly");
    if (encuesta == null) {
        encuesta = new Encuesta();
    }
    String id = encuesta.getId() != null ? String.valueOf(encuesta.getId()) : "";
    String email = encuesta.getEmail() != null ? encuesta.getEmail() : "";
    String nif = encuesta.getNif() != null ? encuesta.getNif() : "";
    String nombre = encuesta.getNombre() != null ? encuesta.getNombre() : "";
    String apellido1 = encuesta.getApellido1() != null ? encuesta.getApellido1() : "";
    String apellido2 = encuesta.getApellido2() != null ? encuesta.getApellido2() : "";
%>
<link type="text/css" rel="stylesheet" href="assets/main.css">


<input type="hidden" name="id" value="<%=id%>">

    <div class="card m-2">
        <div class="card-header text-center fw-bold">
            Nueva Encuesta
        </div>
        <div class="card-body bg-light-subtle">
            <div class="row mb-3">
                <div class="col-12 col-md-6 form-floating">
                    <input type="email" class="form-control" id="email"
                           name="email" placeholder="Introduce tu email"
                           value="<%=email%>" <%=readonly%>
                    >
                    <label for="email">Email</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input type="nif" class="form-control" id="nif"
                           name="nif" placeholder="Introduce el NIF"
                           value="<%=nif%>" <%=readonly%>
                    >
                    <label for="nif">NIF</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="nombre" class="form-control" id="nombre"
                           name="nombre" placeholder="Introduce tu nombre"
                           value="<%=nombre%>" <%=readonly%>
                    >
                    <label for="nombre">Nombre</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="apellido1" class="form-control" id="apellido1"
                           name="apellido1" placeholder="Introduce tu primer apellido"
                           value="<%=apellido1%>" <%=readonly%>
                    >
                    <label for="apellido1">Apellido 1</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="apellido2" class="form-control" id="apellido2"
                           name="apellido2" placeholder="Introduce tu segundo apellido"
                           value="<%=apellido2%>" <%=readonly%>
                    >
                    <label for="apellido2">Apellido 2</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <%-- <input class="btn btn-dark float-end" name="btGuardar" type="submit" value="Guardar"/><br> --%>
            <input class="btn btn-dark float-end" name="btGuardar" type="submit"
                   value="<%=request.getParameter("titleSubmit")%>"/><br>
        </div>
    </div>


NIF: <input name="nif" type="text" size="15" maxlength="15"><br>
Nombre: <input name="nombre" type="text" size="15" maxlength="15"><br>
Apellido1: <input name="apellido1" type="text" size="15" maxlength="15"><br>
Apellido2: <input name="apellido2" type="text" size="15" maxlength="15"><br>
<input name="botGuardar" type="submit" value="Guardar"> <br>
