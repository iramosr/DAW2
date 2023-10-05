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
    <h1>Borra Cliente</h1>
    <form method="post" action="clientes/borrar">
        <jsp:include page="formulario_clientes.jsp">
            <jsp:param name="titleSubmit" value="Borrar"/>
            <jsp:param name="readonly" value="readonly"/>
        </jsp:include>
    </form>
    <jsp:include page="tabla_clientes.jsp"/>
</div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>
