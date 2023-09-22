package com.daw2.aprendejsp02.servelet;

import com.daw2.aprendejsp02.dao.EncuestasDao;
import com.daw2.aprendejsp02.dao.impl.EncuestasDaoImpl;
import com.daw2.aprendejsp02.entity.Encuesta;
import com.daw2.aprendejsp02.service.EncuestasService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

@WebServlet(name = "nuevaencuestaServelet", value = "/encuestas/nueva")
public class NuevaEncuestaServelet extends HttpServlet {
    private EncuestasDao encuestasDao;
    private List<Encuesta> encuestas;

    public void init() {
        //System.out.println("INIT");
        encuestasDao = new EncuestasDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("GET");
        encuestas = encuestasDao.findAll();
        request.setAttribute("encuestas",encuestas);
        request.getRequestDispatcher("/nueva.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("POST");
        Encuesta encuesta = EncuestasService.formToEntity(request);
        //encuestasDao.add(encuesta);
        if (encuestasDao.add(encuesta)!=null){
            request.setAttribute("mensaje","Encuesta guardada");
            encuestas=encuestasDao.findAll();
        }else{
            request.setAttribute("mensaje", "Encuesta no guardada");
        }
        request.setAttribute("encuestas",encuestas);

        request.getRequestDispatcher("/nueva.jsp").forward(request,response);
    }

    public void destroy() {
    }
}