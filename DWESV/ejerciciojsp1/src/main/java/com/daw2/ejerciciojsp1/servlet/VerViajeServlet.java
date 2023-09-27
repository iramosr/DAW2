package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.dao.ViajesDao;
import com.daw2.ejerciciojsp1.dao.impl.ViajesDaoImpl;
import com.daw2.ejerciciojsp1.entity.Viaje;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "verViajeServelet", value = "/viajes/ver")
public class VerViajeServlet extends HttpServlet {
    private ViajesDao viajesDao;
    private List<Viaje> viajes;

    public void init() {
        //System.out.println("INIT");
        viajesDao = new ViajesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Viaje viaje = null;
        try{
            long idver = Long.parseLong(id);
            viaje = viajesDao.get(idver);
        } catch (Exception ex){}

        request.setAttribute("viaje", viaje);
        viajes = viajesDao.findAll();
        request.setAttribute("viajes",viajes);
        request.getRequestDispatcher("/ver_viajes.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        viajes=viajesDao.findAll();

        request.setAttribute("viajes",viajes);

        request.getRequestDispatcher("/ver_viajes.jsp").forward(request,response);
    }

    public void destroy() {
    }
}