package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.dao.EmpleadosDao;
import com.daw2.ejerciciojsp1.dao.impl.EmpleadosDaoImpl;
import com.daw2.ejerciciojsp1.entity.Empleado;
import com.daw2.ejerciciojsp1.service.EmpleadosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "borraEmpleadoServelet", value = "/empleados/borrar")
public class BorraEmpleadoServlet extends HttpServlet {
    private EmpleadosDao empleadosDao;
    private List<Empleado> empleados;

    public void init() {
        //System.out.println("INIT");
        empleadosDao = new EmpleadosDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Empleado empleado = null;
        try{
            long idBorra = Long.parseLong(id);
            empleado = empleadosDao.get(idBorra);
        } catch (Exception ex){}

        request.setAttribute("empleado", empleado);
        empleados = empleadosDao.findAll();
        request.setAttribute("empleados",empleados);
        request.getRequestDispatcher("/borra_empleados.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        Empleado empleado = EmpleadosService.formToEntity(request);

        Long id = empleado.getId();
        if (empleadosDao.delete(id)){
            request.setAttribute("mensaje","Empleado borrado");
            empleados=empleadosDao.findAll();
        }else{
            request.setAttribute("mensaje", "Empleado no borrado");
        }
        request.setAttribute("empleados",empleados);

        request.getRequestDispatcher("/borra_empleados.jsp").forward(request,response);
    }

    public void destroy() {
    }
}