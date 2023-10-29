package com.daw2.ejerciciojsp1.dao;

import com.daw2.ejerciciojsp1.entity.Contratacion;

import java.util.List;

public interface ContratacionesDao extends GenericDao<Contratacion, Long>{
    List<Contratacion> findByIdViaje(Long idviaje);
    List<Contratacion> findByIdCliente(Long idcliente);
}

