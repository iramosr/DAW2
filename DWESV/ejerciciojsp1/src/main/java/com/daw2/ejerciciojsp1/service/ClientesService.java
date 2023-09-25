package com.daw2.ejerciciojsp1.service;

import com.daw2.ejerciciojsp1.entity.Cliente;
import jakarta.servlet.http.HttpServletRequest;

public class ClientesService {
    public static Cliente formToEntity(HttpServletRequest request) throws Exception {
        //  Map<String, String[]> formParams = request.getParameterMap();
        String nif = request.getParameter("nif").trim();
        String nombre = request.getParameter("nombre").trim();
        String apellido1 = request.getParameter("apellido1").trim();
        String apellido2 = request.getParameter("apellido2").trim();
        String email = request.getParameter("email").trim();
        Cliente cliente = new Cliente();
        cliente.setNif(nif);
        cliente.setNombre(nombre);
        cliente.setApellido1(apellido1);
        cliente.setApellido2(apellido2);
        cliente.setEmail(email);
        return cliente;
    }
}
