package com.daw2.viajes.dao;

import com.daw2.viajes.entity.Cliente;

import java.util.List;

public interface ClientesDao extends GenericDao<Cliente, Long>{
    List<Cliente> findByNif(String nif);
}

