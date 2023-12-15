package com.daw2.aprende02.service;

import com.daw2.aprende02.model.entity.Contacto;

import java.util.List;

public interface ContactosService {
    List<Contacto> findAll(String filtro);
    Contacto save(Contacto contacto);
    void delete(long id);

    Contacto update(long id, Contacto contacto);
}
