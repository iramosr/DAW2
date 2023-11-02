package com.daw2.viajes.servlet;

import com.daw2.viajes.entity.Contratacion;
import com.daw2.viajes.dao.impl.ContratacionesDaoImpl;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "listadoContratacionServelet", value = "/contrataciones/listado")
public class ListadoContratacionServlet extends HttpServlet {
    private ContratacionesDaoImpl contratacionesDao;
    private List<Contratacion> contrataciones;

    public void init() {
        contratacionesDao = new ContratacionesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        contrataciones = contratacionesDao.findAll();
        request.setAttribute("contrataciones", contrataciones);
        request.getRequestDispatcher("/listado_contrataciones.jsp").forward(request, response);

    }
}