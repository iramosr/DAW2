<%@ page import="com.daw2.ejerciciojsp1.entity.Cliente" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>

<!DOCTYPE html>

<html>
<jsp:include page="layouts/head.jsp"/>

<body>
<jsp:include page="layouts/main-menu.jsp"/>

<div class="container">
    <h1>Ver Viaje</h1>
    <form method="post" action="viajes/ver">
        <div class="card m-2">
            <jsp:include page="formulario_viajes.jsp"/>
        </div>
    </form>
    <jsp:include page="tabla_viajes.jsp"/>
</div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
