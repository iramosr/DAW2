package com.daw2.aprende02.model.repository;

import com.daw2.aprende02.model.entity.Contacto;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface ContactosRepository extends JpaRepository<Contacto, Long> {

    List<Contacto> findByNombreContaining(String nombre);
    List<Contacto> findByNombreLike (String nombre);

}
