package com.daw2.viajes.dao;

import com.daw2.viajes.entity.Contratacion;

import java.util.List;

public interface ContratacionesDao extends GenericDao<Contratacion, Long>{
    List<Contratacion> findByIdViaje(Long idviaje);
    List<Contratacion> findByIdCliente(Long idcliente);
}

