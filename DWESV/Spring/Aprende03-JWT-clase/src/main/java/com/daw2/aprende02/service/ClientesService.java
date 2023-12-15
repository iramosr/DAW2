package com.daw2.aprende02.service;

import com.daw2.aprende02.model.entity.Cliente;

import java.util.List;

public interface ClientesService {
    Cliente findByNif(String nif);
    List<Cliente> findAll();
    Cliente save(Cliente cliente);
}
