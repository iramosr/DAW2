package com.aprende02.aprende.service.impl;

import com.aprende02.aprende.model.entity.Cliente;
import com.aprende02.aprende.model.repository.ClientesRepository;
import com.aprende02.aprende.service.ClientesService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ClientesServiceImpl implements ClientesService {
    @Autowired
    private ClientesRepository clientesRepository;

    @Override
    public Cliente findByNif(String nif) {
        return clientesRepository.findByNif(nif);
    }

    @Override
    public List<Cliente> findAll() {
        return clientesRepository.findAll();
    }

    @Override
    public Cliente save(Cliente cliente) {
        return clientesRepository.save(cliente);
    }
}
