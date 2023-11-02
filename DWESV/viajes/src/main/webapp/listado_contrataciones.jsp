<%@ page import="com.daw2.viajes.entity.Contratacion" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>
<link href="assets/listado.css" rel="stylesheet">
<!DOCTYPE html>

<html>
<jsp:include page="layouts/head.jsp"/>

<body>
<jsp:include page="layouts/main-menu.jsp"/>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Listado de contrataciones</h1>
        <a class="btn btn-dark mb-auto" href="contrataciones/nuevo">Nueva Contratación</a>
    </div>
    <jsp:include page="tabla_contrataciones.jsp"/>
</div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
