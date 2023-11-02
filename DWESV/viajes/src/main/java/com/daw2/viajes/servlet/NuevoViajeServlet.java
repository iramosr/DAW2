package com.daw2.viajes.servlet;

import com.daw2.viajes.dao.ViajesDao;
import com.daw2.viajes.dao.impl.ViajesDaoImpl;
import com.daw2.viajes.entity.Viaje;
import com.daw2.viajes.service.ViajesService;
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
        request.getRequestDispatcher("/nuevo_viaje.jsp").forward(request,response);

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
            request.setAttribute("mensaje","Viaje guardado");
            viajes = viajesDao.findAll();
        }else{
            request.setAttribute("mensaje", "Viaje no guardado");
        }
        request.setAttribute("viajes",viajes);

        request.getRequestDispatcher("/nuevo_viaje.jsp").forward(request,response);
    }

    public void destroy() {
    }
}