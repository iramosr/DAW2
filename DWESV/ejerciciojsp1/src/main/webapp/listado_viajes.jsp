<%@ page import="com.daw2.ejerciciojsp1.entity.Viaje" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>

<!DOCTYPE html>

<html>
<jsp:include page="layouts/head.jsp"/>

<body>
<jsp:include page="layouts/main-menu.jsp"/>

<div class="container">
    <a class="btn btn-dark" href="viajes/nuevo">Nuevo Viaje</a>
    <h1>Listado de viajes</h1>
    <jsp:include page="tabla_viajes.jsp"/>
</div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
