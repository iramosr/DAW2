<%@ page import="com.daw2.viajes.entity.Viaje" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>
<link href="../assets/listado.css" rel="stylesheet">
<!DOCTYPE html>

<html>
<jsp:include page="../layouts/head.jsp"/>

<body>
<jsp:include page="../layouts/main-menu.jsp"/>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Listado de viajes</h1>
        <a class="btn btn-dark mb-auto" href="viajes/nuevo" title="Nuevo viaje">
            <button class="btn text-center m-0 p-0" style="width: 30px; height: 30px">
                <i class="fa-solid fa-calendar-plus" style="color: #ffffff;"></i>
            </button>
        </a>
    </div>
    <div class="d-flex justify-content-between">
        <h3>Filtrar viajes</h3>
        <form action="viajes/listado" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="filtrotitulo" placeholder="Título del viaje"/>
                <input type="text" class="form-control" name="filtrodescripcion" placeholder="Descripción del viaje"/>
                <button class="btn btn-dark" type="submit">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <jsp:include page="tabla_viajes.jsp"/>
</div>

<jsp:include page="../layouts/footer.jsp"/>

</body>
</html>
