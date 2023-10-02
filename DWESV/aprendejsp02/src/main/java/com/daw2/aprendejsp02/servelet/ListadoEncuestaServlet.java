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
import java.util.List;

@WebServlet(name = "listadoEncuestaServelet", value = "/encuestas/listado")
public class ListadoEncuestaServlet extends HttpServlet {
    private EncuestasDao encuestasDao;
    private List<Encuesta> encuestas;

    public void init() {
        //System.out.println("INIT");
        encuestasDao = new EncuestasDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        encuestas = encuestasDao.findAll();
        request.setAttribute("encuestas", encuestas);
        request.getRequestDispatcher("/listado.jsp").forward(request, response);

    }
}