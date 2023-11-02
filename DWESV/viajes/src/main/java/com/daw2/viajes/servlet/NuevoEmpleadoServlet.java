package com.daw2.viajes.servlet;

import com.daw2.viajes.dao.EmpleadosDao;
import com.daw2.viajes.dao.impl.EmpleadosDaoImpl;
import com.daw2.viajes.entity.Empleado;
import com.daw2.viajes.service.EmpleadosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "nuevoempleadoServelet", value = "/empleados/nuevo")
public class NuevoEmpleadoServlet extends HttpServlet {
    private EmpleadosDao empleadosDao;
    private List<Empleado> empleados;

    public void init() {
        //System.out.println("INIT");
        empleadosDao = new EmpleadosDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("GET");
        empleados = empleadosDao.findAll();
        request.setAttribute("empleados",empleados);
        request.getRequestDispatcher("/nuevo_empleado.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("POST");
        Empleado empleado = null;
        try {
            empleado = EmpleadosService.formToEntity(request);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }
        //encuestasDao.add(encuesta);
        if (empleadosDao.add(empleado)!=null){
            request.setAttribute("mensaje","Empleado guardada");
            empleados=empleadosDao.findAll();
        }else{
            request.setAttribute("mensaje", "Empleado no guardada");
        }
        request.setAttribute("empleados",empleados);

        request.getRequestDispatcher("/nuevo_empleado.jsp").forward(request,response);
    }

    public void destroy() {
    }
}