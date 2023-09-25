package com.daw2.ejerciciojsp1.dao;

import com.daw2.ejerciciojsp1.entity.Cliente;
import com.daw2.ejerciciojsp1.entity.Viaje;

import java.util.List;

public interface ClientesDao extends GenericDao<Cliente, Long>{
    List<Cliente> findByNif(String nif);
}

