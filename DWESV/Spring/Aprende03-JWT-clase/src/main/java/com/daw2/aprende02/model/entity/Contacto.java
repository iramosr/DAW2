package com.daw2.aprende02.model.entity;

import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;

import java.time.Instant;

@NoArgsConstructor @AllArgsConstructor
//@Setter @Getter @ToString
@Data
@Entity
@Table(name = "contactos")
public class Contacto {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    @Column(length = 20, nullable = false)
    private String nombre;
    @Column(length = 40, nullable = false)
    private String apellidos;
    @Column(length = 150)
    private String empresa;
    @Column(length = 150)
    private String puesto;
    @Column(length = 250)
    private String web;
    @Column(columnDefinition = "TEXT")
    private String notas;
    @Column(length = 250)
    private String direccion;
    @Column(length = 250)
    private String poblacion;
    @Column(length = 250)
    private String provincia;
    @Column(length = 6)
    private String cp;
    @CreationTimestamp
    private Instant createdAt;
    @UpdateTimestamp
    private Instant updatedAt;

}
