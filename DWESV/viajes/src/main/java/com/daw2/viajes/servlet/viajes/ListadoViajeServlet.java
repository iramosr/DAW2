package com.daw2.viajes.servlet.viajes;

import com.daw2.viajes.dao.ViajesDao;
import com.daw2.viajes.dao.impl.ViajesDaoImpl;
import com.daw2.viajes.entity.Viaje;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "listadoViajeServelet", value = "/viajes/listado")
public class ListadoViajeServlet extends HttpServlet {
    private ViajesDao viajesDao;
    private List<Viaje> viajes;

    public void init() {
        //System.out.println("INIT");
        viajesDao = new ViajesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        viajes = viajesDao.filtrarViajes(request.getParameter("filtrotitulo"), request.getParameter("filtrodescripcion"));
        System.out.println(viajes);
        request.setAttribute("viajes", viajes);
        request.getRequestDispatcher("/viajes/listado_viajes.jsp").forward(request, response);

    }
}