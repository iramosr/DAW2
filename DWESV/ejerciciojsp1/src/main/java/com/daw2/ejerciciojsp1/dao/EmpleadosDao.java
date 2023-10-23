package com.daw2.ejerciciojsp1.dao;

import com.daw2.ejerciciojsp1.entity.Empleado;

import java.util.List;

public interface EmpleadosDao extends GenericDao<Empleado, Long>{
    List<Empleado> findByNif(String nif);
}

