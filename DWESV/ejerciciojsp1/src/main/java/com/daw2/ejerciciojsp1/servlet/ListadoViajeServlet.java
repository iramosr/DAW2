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

@WebServlet(name = "listadoViajeServelet", value = "/viajes/listado")
public class ListadoViajeServlet extends HttpServlet {
    private ViajesDao viajesDao;
    private List<Viaje> viajes;

    public void init() {
        //System.out.println("INIT");
        viajesDao = new ViajesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        viajes = viajesDao.findAll();
        request.setAttribute("viajes", viajes);
        request.getRequestDispatcher("/listado_viajes.jsp").forward(request, response);

    }
}