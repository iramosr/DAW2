package com.daw2.viajes.servlet.contrataciones;

import com.daw2.viajes.entity.Contratacion;
import com.daw2.viajes.dao.ContratacionesDao;
import com.daw2.viajes.dao.impl.ContratacionesDaoImpl;
import com.daw2.viajes.service.ContratacionService;
import jakarta.servlet.ServletException;
import jakarta.servlet.ServletOutputStream;
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
        System.out.println(request);
        contrataciones = contratacionesDao.findAll();
        request.setAttribute("contrataciones",contrataciones);
        request.getRequestDispatcher("/contrataciones/nueva_contratacion.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
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

        request.getRequestDispatcher("/contrataciones/nueva_contratacion.jsp").forward(request,response);
    }

    public void destroy() {
    }
}