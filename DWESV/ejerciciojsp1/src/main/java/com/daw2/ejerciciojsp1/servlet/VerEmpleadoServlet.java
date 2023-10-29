package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.dao.EmpleadosDao;
import com.daw2.ejerciciojsp1.dao.ViajesDao;
import com.daw2.ejerciciojsp1.dao.impl.EmpleadosDaoImpl;
import com.daw2.ejerciciojsp1.dao.impl.ViajesDaoImpl;
import com.daw2.ejerciciojsp1.entity.Empleado;
import com.daw2.ejerciciojsp1.entity.Viaje;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "verEmpleadoServelet", value = "/empleados/ver")
public class VerEmpleadoServlet extends HttpServlet {
    private EmpleadosDao empleadosDao;
    private ViajesDao viajesDao;
    private List<Empleado> empleados;
    private List<Viaje> viajes;

    public void init() {
        //System.out.println("INIT");
        empleadosDao = new EmpleadosDaoImpl();
        viajesDao = new ViajesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Empleado empleado = null;
        try{
            long idver = Long.parseLong(id);
            empleado = empleadosDao.get(idver);

            viajes = viajesDao.findByIdEmpleado(empleado.getId());
        } catch (Exception ex){}

        request.setAttribute("empleado", empleado);
        request.setAttribute("viajes",viajes);

        empleados = empleadosDao.findAll();
        request.setAttribute("empleados",empleados);
        request.getRequestDispatcher("/ver_empleados.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        empleados=empleadosDao.findAll();

        request.setAttribute("empleados",empleados);

        request.getRequestDispatcher("/ver_empleados.jsp").forward(request,response);
    }

    public void destroy() {
    }
}