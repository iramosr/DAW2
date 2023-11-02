package com.daw2.viajes.servlet;

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

@WebServlet(name = "nuevoclienteServelet", value = "/clientes/nuevo")
public class NuevoClienteServlet extends HttpServlet {
    private ClientesDao clientesDao;
    private List<Cliente> clientes;

    public void init() {
        //System.out.println("INIT");
        clientesDao = new ClientesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("GET");
        clientes = clientesDao.findAll();
        request.setAttribute("clientes",clientes);
        request.getRequestDispatcher("/nuevo_cliente.jsp").forward(request,response);

    }
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //System.out.println("POST");
        Cliente cliente = null;
        try {
            cliente = ClientesService.formToEntity(request);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }
        //encuestasDao.add(encuesta);
        if (clientesDao.add(cliente)!=null){
            request.setAttribute("mensaje","Cliente guardado");
            clientes=clientesDao.findAll();
        }else{
            request.setAttribute("mensaje", "Cliente no guardado");
        }
        request.setAttribute("clientes",clientes);

        request.getRequestDispatcher("/nuevo_cliente.jsp").forward(request,response);
    }

    public void destroy() {
    }
}