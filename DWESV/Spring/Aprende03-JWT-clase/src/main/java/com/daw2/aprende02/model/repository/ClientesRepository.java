package com.daw2.aprende02.model.repository;

import com.daw2.aprende02.model.entity.Cliente;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ClientesRepository extends JpaRepository<Cliente, Long> {
    Cliente findByNif(String nif);
}
