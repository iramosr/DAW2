package com.daw2.ejerciciojsp1.entity;

import jakarta.persistence.*;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

@Entity
@Table(name = "viajes")
public class Viaje {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    @Column(unique = true,length = 12)
    private String codigo;
    @Column(nullable = false,length = 50)
    private String descripcion;
    @Column(nullable = false)
    private Double precio;
    @Column(nullable = false)
    private Date salida;
    @Column(nullable = false)
    private Date llegada;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(String precio) {
        this.precio = Double.parseDouble(precio);
    }

    public Date getSalida() {
        return salida;
    }

    public void setSalida(String salida) throws Exception {
        this.salida = new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").parse(salida);
    }

    public Date getLlegada() {
        return llegada;
    }

    public void setLlegada(String llegada) throws Exception {
        this.llegada = new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").parse(llegada);
    }
}
