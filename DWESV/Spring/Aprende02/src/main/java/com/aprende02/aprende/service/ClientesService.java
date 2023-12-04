package com.aprende02.aprende.service;

import com.aprende02.aprende.model.entity.Cliente;

import java.util.List;

public interface ClientesService {
    Cliente findByNif(String nif);
    List<Cliente> findAll();
    Cliente save(Cliente cliente);
}
