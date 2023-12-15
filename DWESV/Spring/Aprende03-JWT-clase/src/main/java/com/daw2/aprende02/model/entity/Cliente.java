package com.daw2.aprende02.model.entity;

import jakarta.persistence.*;
import lombok.*;
import lombok.extern.slf4j.Slf4j;
import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;

import java.io.Serializable;
import java.time.Instant;
import java.util.Date;

@NoArgsConstructor @AllArgsConstructor
@Setter @Getter @ToString
@Slf4j
@Entity
@Table(name="clientes")
public class Cliente implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    @Column(length = 12, unique = true, nullable = false)
    private String nif;
    @Column(length = 20, nullable = false)
    private String nombre;
    @Column(length = 20, nullable = false)
    private String apellido1;
    @Column(length = 20)
    private String apellido2;

    //@NotNull(message = "Debe indicar la fecha")
   // @DateTimeFormat(pattern = "yyyy-MM-dd")
    @Column(nullable = true)
    @Temporal(TemporalType.DATE)
    private Date fechaNacimiento;
    @Column(nullable = true)
    private String foto;
    @Column(columnDefinition = "TEXT")
    private String observaciones;
    @CreationTimestamp
    private Instant createdAt;
    @UpdateTimestamp
    private Instant updatedAt;
}


