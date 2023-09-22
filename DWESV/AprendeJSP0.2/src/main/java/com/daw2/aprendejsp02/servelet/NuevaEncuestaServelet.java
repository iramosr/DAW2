package com.daw2.aprendejsp02.servelet;

import com.daw2.aprendejsp02.dao.EncuestasDao;
import com.daw2.aprendejsp02.dao.impl.EncuestasDaoImpl;
import com.daw2.aprendejsp02.entity.Encuesta;
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
    private List<Encuesta> encuestas;

    public void init() {
        System.out.println("INIT");
        encuestas = new ArrayList();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        System.out.println("GET");
        request.setAttribute("encuestas",encuestas);
        request.getRequestDispatcher("/formulario.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        System.out.println("POST");

       //  Map<String, String[]> formParams = request.getParameterMap();
        String nif = request.getParameter("nif").trim();
        String nombre = request.getParameter("nombre").trim();
        String apellido = request.getParameter("apellido").trim();
        String apellido2 = request.getParameter("apellido2").trim();
        Encuesta encuesta = new Encuesta();
        encuesta.setNif(nif);
        encuesta.setNombre(nombre);
        encuesta.setApellido1(apellido);
        encuesta.setApellido2(apellido2);
        encuestas.add(encuesta);
        EncuestasDao encuestasDao = new EncuestasDaoImpl();
        //encuestasDao.add(encuesta);
        if (encuestasDao.add(encuesta)!=null){
            request.setAttribute("mensaje","Encuesta guardada");
            encuestas=encuestasDao.findAll();

        }else{
            request.setAttribute("mensaje", "Encuesta no guardada");
        }
        request.setAttribute("encuestas",encuestas);

        request.getRequestDispatcher("/formulario.jsp").forward(request,response);
    }

    public void destroy() {
    }
}