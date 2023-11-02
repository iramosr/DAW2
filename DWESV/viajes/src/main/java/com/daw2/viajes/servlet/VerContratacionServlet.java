package com.daw2.viajes.servlet;

import com.daw2.viajes.dao.ContratacionesDao;
import com.daw2.viajes.dao.impl.ContratacionesDaoImpl;
import com.daw2.viajes.entity.Contratacion;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "verContratacionServelet", value = "/contrataciones/ver")
public class VerContratacionServlet extends HttpServlet {
    private ContratacionesDao contratacionesDao;
    private List<Contratacion> contrataciones;

    public void init() {
        //System.out.println("INIT");
        contratacionesDao = new ContratacionesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Contratacion contratacion = null;
        try{
            long idver = Long.parseLong(id);
            contratacion = contratacionesDao.get(idver);
        } catch (Exception ex){}

        request.setAttribute("contratacion", contratacion);
        contrataciones = contratacionesDao.findAll();
        request.setAttribute("contrataciones",contrataciones);
        request.getRequestDispatcher("/ver_contrataciones.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        contrataciones = contratacionesDao.findAll();

        request.setAttribute("contrataciones",contrataciones);

        request.getRequestDispatcher("/ver_contrataciones.jsp").forward(request,response);
    }

    public void destroy() {
    }
}