<%@ page import="com.daw2.ejerciciojsp1.entity.Empleado" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>

<!DOCTYPE html>

<html>
<jsp:include page="layouts/head.jsp"/>

<body>
<jsp:include page="layouts/main-menu.jsp"/>

<div class="container">
    <h1>Ver Empleado</h1>
    <form method="#" action="empleados/listado">
        <jsp:include page="formulario_empleados.jsp">
            <jsp:param name="titleSubmit" value="Volver"/>
            <jsp:param name="readonly" value="readonly"/>
        </jsp:include>
    </form>
    <jsp:include page="tabla_empleados.jsp"/>
</div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
