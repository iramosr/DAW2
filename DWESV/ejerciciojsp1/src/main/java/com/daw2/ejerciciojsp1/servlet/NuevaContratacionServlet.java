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

@WebServlet(name = "nuevacontratacionServelet", value = "/contrataciones/nuevo")
public class NuevaContratacionServlet extends HttpServlet {
    private ContratacionesDao contratacionesDao;
    private List<Contratacion> contrataciones;

    public void init() {
        //System.out.println("INIT");
        contratacionesDao = new ContratacionesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("GET");
        contrataciones = contratacionesDao.findAll();
        request.setAttribute("contrataciones",contrataciones);
        request.getRequestDispatcher("/nueva_contratacion.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("POST");
        Contratacion contratacion = null;
        try {
            contratacion = ContratacionService.formToEntity(request);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }

        if (contratacionesDao.add(contratacion)!=null){
            request.setAttribute("mensaje","Contratación guardada");
            contrataciones = contratacionesDao.findAll();
        }else{
            request.setAttribute("mensaje", "Contratación no guardada");
        }
        request.setAttribute("contrataciones",contrataciones);

        request.getRequestDispatcher("/nueva_contratacion.jsp").forward(request,response);
    }

    public void destroy() {
    }
}