package com.daw2.ejerciciojsp1.entity;

import jakarta.persistence.*;

import java.util.Date;

@Entity
@Table(name = "viajes")
public class Viaje {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    //aqui va una foreign key a la tabla empleados
    @ManyToOne
    @JoinColumn(name = "empleado_id")
    private Empleado empleado;

    @Column(unique = true, length = 12)
    private String codigo;
    @Column(nullable = false)
    private String titulo;
    @Column(nullable = false)
    private Double precio;
    @Column(nullable = false)
    private Date salida;
    @Column(nullable = false)
    private Date llegada;
    @Column(nullable = false, length = 255)
    private String descripcion;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Empleado getEmpleado() {
        return empleado;
    }

    public void setEmpleado(Empleado empleado) {
        this.empleado = empleado;
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public Double getPrecio() {
        return precio;
    }

    public void setPrecio(Double precio) {
        this.precio = precio;
    }

    public Date getSalida() {
        return salida;
    }

    public void setSalida(Date salida) {
        this.salida = salida;
    }

    public Date getLlegada() {
        return llegada;
    }

    public void setLlegada(Date llegada) {
        this.llegada = llegada;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    @Override
    public String toString() {
        return "Viaje{" +
                "id=" + id +
                ", empleado=" + empleado +
                ", codigo='" + codigo + '\'' +
                ", titulo='" + titulo + '\'' +
                ", precio=" + precio +
                ", salida=" + salida +
                ", llegada=" + llegada +
                ", descripcion='" + descripcion + '\'' +
                '}';
    }
}
