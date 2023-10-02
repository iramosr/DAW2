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

@WebServlet(name = "actualizaEncuestaServelet", value = "/encuestas/actualizar")
public class ActualizaEncuestaServelet extends HttpServlet {
    private EncuestasDao encuestasDao;
    private List<Encuesta> encuestas;

    public void init() {
        //System.out.println("INIT");
        encuestasDao = new EncuestasDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        //Encuesta encuesta = encuestasDao.get(Long.parseLong(id));
        Encuesta encuesta = null;
        try {
            long idBorra = Long.parseLong(id);
            encuesta = encuestasDao.get(idBorra);
        } catch (Exception ex) {
        }

        request.setAttribute("encuesta", encuesta);
        encuestas = encuestasDao.findAll();
        request.setAttribute("encuestas", encuestas);
        request.getRequestDispatcher("/actualiza.jsp").forward(request, response);

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        Encuesta encuesta = EncuestasService.formToEntity(request);

        if (encuestasDao.uptade(encuesta)) {
            request.setAttribute("mensaje", "Encuesta guardada");
            encuestas = encuestasDao.findAll();
        } else {
            request.setAttribute("mensaje", "Encuesta no guardada");
        }
        request.setAttribute("encuestas", encuestas);

        request.getRequestDispatcher("/actualiza.jsp").forward(request, response);
    }

    public void destroy() {
    }
}