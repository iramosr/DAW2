package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.entity.Contratacion;
import com.daw2.ejerciciojsp1.dao.ContratacionesDao;
import com.daw2.ejerciciojsp1.dao.impl.ContratacionesDaoImpl;
import com.daw2.ejerciciojsp1.service.ContratacionService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "actualizaContratacionServlet", value = "/contrataciones/actualizar")
public class ActualizaContratacionServlet extends HttpServlet {
    private ContratacionesDao contratacionesDao;
    private List<Contratacion> contrataciones;

    public void init() {
        contratacionesDao = new ContratacionesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Contratacion contratacion = null;
        try {
            long idBorra = Long.parseLong(id);
            contratacion = contratacionesDao.get(idBorra);
        } catch (Exception ex) {
        }

        request.setAttribute("contratacion", contratacion);
        contrataciones = contratacionesDao.findAll();
        request.setAttribute("contrataciones", contrataciones);
        request.getRequestDispatcher("/actualiza_contrataciones.jsp").forward(request, response);

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        Contratacion contratacion = ContratacionService.formToEntity(request);

        if (contratacionesDao.update(contratacion)) {
            request.setAttribute("mensaje", "Contratación actualizada");
            contrataciones = contratacionesDao.findAll();
        } else {
            request.setAttribute("mensaje", "Contratación no actualizado");
        }
        request.setAttribute("contrataciones", contrataciones);

        request.getRequestDispatcher("/actualiza_contrataciones.jsp").forward(request, response);
    }

    public void destroy() {
    }
}