<%@ page import="com.daw2.viajes.entity.Cliente" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8" %>

<!DOCTYPE html>

<html>
<jsp:include page="../layouts/head.jsp"/>

<body>
<jsp:include page="../layouts/main-menu.jsp"/>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Listado de clientes</h1>
        <a class="btn btn-dark mb-auto" href="clientes/nuevo" title="Nuevo cliente">
            <button class="btn text-center m-0 p-0" style="width: 30px; height: 30px">
                <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
            </button>
        </a>
    </div>
    <jsp:include page="tabla_clientes.jsp"/>
</div>

<jsp:include page="../layouts/footer.jsp"/>

</body>
</html>
