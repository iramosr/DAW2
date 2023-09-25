package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.dao.ViajesDao;
import com.daw2.ejerciciojsp1.dao.impl.ViajesDaoImpl;
import com.daw2.ejerciciojsp1.entity.Viaje;
import com.daw2.ejerciciojsp1.service.ViajesService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "nuevoviajeServelet", value = "/viajes/nuevo")
public class NuevoViajeServlet extends HttpServlet {
    private ViajesDao viajesDao;
    private List<Viaje> viajes;

    public void init() {
        //System.out.println("INIT");
        viajesDao = new ViajesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("GET");
        viajes = viajesDao.findAll();
        request.setAttribute("viajes",viajes);
        request.getRequestDispatcher("/nuevov.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("POST");
        Viaje viaje = null;
        try {
            viaje = ViajesService.formToEntity(request);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }
        //encuestasDao.add(encuesta);
        if (viajesDao.add(viaje)!=null){
            request.setAttribute("mensaje","Encuesta guardada");
            viajes = viajesDao.findAll();
        }else{
            request.setAttribute("mensaje", "Encuesta no guardada");
        }
        request.setAttribute("viajes",viajes);

        request.getRequestDispatcher("/nuevov.jsp").forward(request,response);
    }

    public void destroy() {
    }
}