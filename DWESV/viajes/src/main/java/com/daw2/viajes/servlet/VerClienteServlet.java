package com.daw2.viajes.servlet;

import com.daw2.viajes.dao.ClientesDao;
import com.daw2.viajes.dao.ContratacionesDao;
import com.daw2.viajes.dao.impl.ClientesDaoImpl;
import com.daw2.viajes.dao.impl.ContratacionesDaoImpl;
import com.daw2.viajes.entity.Cliente;
import com.daw2.viajes.entity.Contratacion;
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
    private ContratacionesDao contratacionesDao;
    private List<Cliente> clientes;
    private List<Contratacion> contrataciones;

    public void init() {
        //System.out.println("INIT");
        clientesDao = new ClientesDaoImpl();
        contratacionesDao = new ContratacionesDaoImpl();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        String id = request.getParameter("id").trim();

        Cliente cliente = null;
        try{
            long idver = Long.parseLong(id);
            cliente = clientesDao.get(idver);
            contrataciones = contratacionesDao.findByIdCliente(cliente.getId());
        } catch (Exception ex){}

        request.setAttribute("cliente", cliente);
        request.setAttribute("contrataciones",contrataciones);
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