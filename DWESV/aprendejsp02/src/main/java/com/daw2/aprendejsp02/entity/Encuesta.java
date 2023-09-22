package com.daw2.aprendejsp02.entity;

import jakarta.persistence.*;

@Entity
@Table(name = "encuestas")
public class Encuesta {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long Id;
    @Column(unique = true,length = 12)
    private String nif;
    @Column(nullable = false,length = 20)
    private String nombre;
    @Column(nullable = false,length = 20)
    private String apellido1;
    @Column(length = 20)
    private String apellido2;

    public Long getId() {
        return Id;
    }

    public void setId(Long id) {
        Id = id;
    }

    public String getNif() {
        return nif;
    }

    public void setNif(String nif) {
        this.nif = nif;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido1() {
        return apellido1;
    }

    public void setApellido1(String apellido1) {
        this.apellido1 = apellido1;
    }

    public String getApellido2() {
        return apellido2;
    }

    public void setApellido2(String apellido2) {
        this.apellido2 = apellido2;
    }
}
