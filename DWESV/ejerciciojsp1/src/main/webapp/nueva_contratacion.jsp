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
    <h1>Nueva Contratación</h1>
    <form method="post" action="contrataciones/nuevo">
        <jsp:include page="formulario_contrataciones.jsp">
            <jsp:param name="titleSubmit" value="Guardar"/>
            <jsp:param name="readonly" value=""/>
            <jsp:param name="disbled" value=""/>
            <jsp:param name="required" value="required"/>
        </jsp:include>
    </form>

    <jsp:include page="tabla_contrataciones.jsp"/>
</div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
