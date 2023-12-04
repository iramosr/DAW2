package com.aprende02.aprende.model.repository;

import com.aprende02.aprende.model.entity.Cliente;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ClientesRepository extends JpaRepository<Cliente, Long> {
    Cliente findByNif(String nif);

    Cliente findByNombreAndApellido1AndApellido2(String nombre, String apellido1, String apellido2);
}
