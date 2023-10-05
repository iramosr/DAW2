package com.daw2.ejerciciojsp1.servlet;

import com.daw2.ejerciciojsp1.dao.ClientesDao;
import com.daw2.ejerciciojsp1.dao.impl.ClientesDaoImpl;
import com.daw2.ejerciciojsp1.entity.Cliente;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.List;

@WebServlet(name = "listadoClienteServelet", value = "/clientes/listado")
public class ListadoClienteServlet extends HttpServlet {
    private ClientesDao clientesDao;
    private List<Cliente> clientes;

    public void init() {
        //System.out.println("INIT");
        clientesDao = new ClientesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        clientes = clientesDao.findAll();
        request.setAttribute("clientes", clientes);
        request.getRequestDispatcher("/listado_clientes.jsp").forward(request, response);

    }
}