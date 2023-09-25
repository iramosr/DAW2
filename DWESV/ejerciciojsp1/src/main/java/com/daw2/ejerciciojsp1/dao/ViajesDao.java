package com.daw2.ejerciciojsp1.dao;

import com.daw2.ejerciciojsp1.entity.Viaje;
import com.daw2.ejerciciojsp1.entity.Viaje;

import java.util.List;

public interface ViajesDao extends GenericDao<Viaje, Long>{
    List<Viaje> findByCodigo(String codigo);
}

