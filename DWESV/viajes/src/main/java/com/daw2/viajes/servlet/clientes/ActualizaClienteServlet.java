package com.daw2.viajes.servlet.clientes;

import com.daw2.viajes.dao.ClientesDao;
import com.daw2.viajes.dao.impl.ClientesDaoImpl;
import com.daw2.viajes.entity.Cliente;
import com.daw2.viajes.service.ClientesService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "actualizaClienteServlet", value = "/clientes/actualizar")
public class ActualizaClienteServlet extends HttpServlet {
    private ClientesDao clientesDao;
    private List<Cliente> clientes;

    public void init() {
        //System.out.println("INIT");
        clientesDao = new ClientesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();


        Cliente cliente = null;
        try {
            long idBorra = Long.parseLong(id);
            cliente = clientesDao.get(idBorra);
        } catch (Exception ex) {
        }

        request.setAttribute("cliente", cliente);
        clientes = clientesDao.findAll();
        request.setAttribute("clientes", clientes);
        request.getRequestDispatcher("/clientes/actualiza_clientes.jsp").forward(request, response);

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        Cliente cliente = ClientesService.formToEntity(request);

        if (clientesDao.update(cliente)) {
            request.setAttribute("mensaje", "Cliente actualizado");
            clientes = clientesDao.findAll();
        } else {
            request.setAttribute("mensaje", "Cliente no actualizado");
        }
        request.setAttribute("clientes", clientes);

        request.getRequestDispatcher("/clientes/actualiza_clientes.jsp").forward(request, response);
    }

    public void destroy() {
    }
}