package com.daw2.viajes.dao;

import com.daw2.viajes.entity.Viaje;

import java.util.List;

public interface ViajesDao extends GenericDao<Viaje, Long>{
    Viaje findByCodigo(String codigo);

    List<Viaje> findByIdCliente(Long idCliente);

    List<Viaje> findByIdEmpleado(Long idEmpleado);

    List<Viaje> filtrarViajes(String filtro1, String filtro2);
}

