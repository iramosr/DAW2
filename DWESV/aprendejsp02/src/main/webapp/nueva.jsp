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
        <h1>Nueva Encuesta</h1>
        <jsp:include page="formulario.jsp"/>

        <jsp:include page="tabla.jsp"/>
    </div>

<jsp:include page="layouts/footer.jsp"/>

</body>
</html>