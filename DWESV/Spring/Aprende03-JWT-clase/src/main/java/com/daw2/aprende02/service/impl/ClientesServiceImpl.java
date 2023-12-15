package com.daw2.aprende02.service.impl;

import com.daw2.aprende02.model.entity.Cliente;
import com.daw2.aprende02.model.repository.ClientesRepository;
import com.daw2.aprende02.service.ClientesService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;


@Service
public class ClientesServiceImpl implements ClientesService {
    @Autowired
    private ClientesRepository clientesRepository;

    private Logger logger = LoggerFactory.getLogger(ClientesServiceImpl.class);

    @Override
    @Transactional(readOnly = true)
    public Cliente findByNif(String nif) {
        return clientesRepository.findByNif(nif);
    }

    @Override
    @Transactional(readOnly = true)
    public List<Cliente> findAll() {
        return clientesRepository.findAll();
    }

    @Override
    @Transactional
    public Cliente save(Cliente cliente) {
        return clientesRepository.save(cliente);
    }

}
