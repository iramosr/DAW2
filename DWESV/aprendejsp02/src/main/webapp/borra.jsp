<%@ page import="com.daw2.aprendejsp02.entity.Encuesta" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>

<!DOCTYPE html>

<html>
<jsp:include page="layouts/head.jsp"/>

<body>
<jsp:include page="layouts/main-menu.jsp"/>

    <div class="container">
        <h1>Borra Encuesta</h1>
        <form method="post" action="encuestas/borrar">
            <jsp:include page="formulario.jsp"/>
        </form>
        <jsp:include page="tabla.jsp"/>
    </div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>