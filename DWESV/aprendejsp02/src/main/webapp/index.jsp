<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
    <title>JSP - Hello World</title>
    <jsp:include page="layouts/head.jsp"/>
</head>
<body>
<jsp:include page="layouts/main-menu.jsp"/>
<h1><%= "Hello World!" %>
</h1>
<br/>
<a href="hello-servlet">Hello Servlet</a>
<jsp:include page="layouts/footer.jsp"/>
</body>
</html>