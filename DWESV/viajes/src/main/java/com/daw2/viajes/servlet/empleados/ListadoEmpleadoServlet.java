package com.daw2.viajes.servlet.empleados;

import com.daw2.viajes.dao.EmpleadosDao;
import com.daw2.viajes.dao.impl.EmpleadosDaoImpl;
import com.daw2.viajes.entity.Empleado;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "listadoEmpleadoServelet", value = "/empleados/listado")
public class ListadoEmpleadoServlet extends HttpServlet {
    private EmpleadosDao empleadosDao;
    private List<Empleado> empleados;

    public void init() {
        //System.out.println("INIT");
        empleadosDao = new EmpleadosDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        empleados = empleadosDao.findAll();
        request.setAttribute("empleados", empleados);
        request.getRequestDispatcher("/empleados/listado_empleados.jsp").forward(request, response);

    }
}