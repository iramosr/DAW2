package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.dao.ClientesDao;
import com.daw2.ejerciciojsp1.dao.impl.ClientesDaoImpl;
import com.daw2.ejerciciojsp1.entity.Cliente;
import com.daw2.ejerciciojsp1.service.ClientesService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "verClienteServelet", value = "/clientes/ver")
public class VerClienteServlet extends HttpServlet {
    private ClientesDao clientesDao;
    private List<Cliente> clientes;

    public void init() {
        //System.out.println("INIT");
        clientesDao = new ClientesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Cliente cliente = null;
        try{
            long idver = Long.parseLong(id);
            cliente = clientesDao.get(idver);
        } catch (Exception ex){}

        request.setAttribute("cliente", cliente);
        clientes = clientesDao.findAll();
        request.setAttribute("clientes",clientes);
        request.getRequestDispatcher("/ver_clientes.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {

        clientes=clientesDao.findAll();

        request.setAttribute("clientes",clientes);

        request.getRequestDispatcher("/ver_clientes.jsp").forward(request,response);
    }

    public void destroy() {
    }
}