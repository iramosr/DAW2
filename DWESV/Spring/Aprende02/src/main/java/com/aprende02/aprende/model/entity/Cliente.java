package com.aprende02.aprende.model.entity;

import jakarta.persistence.*;
import lombok.*;
import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;

import java.time.Instant;
import java.util.Date;
@NoArgsConstructor
@AllArgsConstructor
@Setter
@Getter
@ToString

@Entity
@Table(name = "clientes")
public class Cliente {
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
    @Column(name = "fecha_nacimiento")
    private Date fechaNacimiento;
    private String foto;
    @Column(columnDefinition = "TEXT")
    private String observaciones;
    @CreationTimestamp
    private Instant createdAt;
    @UpdateTimestamp
    private Instant updatedAt;
}
