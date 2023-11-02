package com.daw2.viajes.dao;

import com.daw2.viajes.entity.Empleado;

import java.util.List;

public interface EmpleadosDao extends GenericDao<Empleado, Long>{
    List<Empleado> findByNif(String nif);
}

