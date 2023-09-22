package com.daw2.aprendejsp02.dao;

import com.daw2.aprendejsp02.entity.Encuesta;

import java.util.List;

public interface EncuestasDao extends GenericDao<Encuesta, Long>{
    List<Encuesta> findByNif(String nif);
}

