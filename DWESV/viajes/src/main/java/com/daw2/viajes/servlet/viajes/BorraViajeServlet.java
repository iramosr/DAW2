package com.daw2.viajes.servlet.viajes;

import com.daw2.viajes.dao.ViajesDao;
import com.daw2.viajes.dao.impl.ViajesDaoImpl;
import com.daw2.viajes.entity.Viaje;
import com.daw2.viajes.service.ViajesService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "borraViajeServelet", value = "/viajes/borrar")
public class BorraViajeServlet extends HttpServlet {
    private ViajesDao viajesDao;
    private List<Viaje> viajes;

    public void init() {
        //System.out.println("INIT");
        viajesDao = new ViajesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Viaje viaje = null;
        try {
            long idBorra = Long.parseLong(id);
            viaje = viajesDao.get(idBorra);
        } catch (Exception ex) {
        }

        request.setAttribute("viaje", viaje);
        viajes = viajesDao.findAll();
        request.setAttribute("viajes", viajes);
        request.getRequestDispatcher("/viajes/borra_viajes.jsp").forward(request, response);

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

        Viaje viaje = ViajesService.formToEntity(request);


        Long id = viaje.getId();
        if (viajesDao.delete(id)) {
            request.setAttribute("mensaje", "Viaje borrado");
            viajes = viajesDao.findAll();
        } else {
            request.setAttribute("mensaje", "Cliente no borrado");
        }
        request.setAttribute("viajes", viajes);

        request.getRequestDispatcher("/viajes/borra_viajes.jsp").forward(request, response);
    }

    public void destroy() {
    }
}