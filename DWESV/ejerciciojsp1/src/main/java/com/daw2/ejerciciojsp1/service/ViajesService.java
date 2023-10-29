package com.daw2.ejerciciojsp1.service;

import com.daw2.ejerciciojsp1.dao.impl.EmpleadosDaoImpl;
import com.daw2.ejerciciojsp1.entity.Empleado;
import com.daw2.ejerciciojsp1.entity.Viaje;

import jakarta.servlet.http.HttpServletRequest;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

public class ViajesService {
    public static Viaje formToEntity(HttpServletRequest request){
        EmpleadosDaoImpl empleadosDao = new EmpleadosDaoImpl();

        //  Map<String, String[]> formParams = request.getParameterMap();
        Long id = null;
        try {
            id = Long.parseLong(request.getParameter("id").trim());
        }catch (Exception ex){}
        String idempleado = request.getParameter("empleado").trim();
        String codigo = request.getParameter("codigo").trim();
        String titulo = request.getParameter("titulo").trim();
        Empleado empleado = empleadosDao.get(Long.parseLong(idempleado));
        Double precio = Double.parseDouble(request.getParameter("precio").trim());

        //Fechas
        Date salida = null;
        try {
            salida = new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").parse(request.getParameter("salida").trim());
        } catch (ParseException e) {
            throw new RuntimeException(e);
        }
        Date llegada = null;
        try {
            llegada = new SimpleDateFormat("dd/MM/yyyy hh:mm:ss").parse(request.getParameter("llegada").trim());
        } catch (ParseException e) {
            throw new RuntimeException(e);
        }
        String descripcion = request.getParameter("descripcion").trim();

        Viaje viaje = new Viaje();
        viaje.setId(id);
        viaje.setEmpleado(empleado);
        viaje.setCodigo(codigo);
        viaje.setTitulo(titulo);
        viaje.setPrecio(precio);
        try {
            viaje.setSalida(salida);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }
        try {
            viaje.setLlegada(llegada);
        } catch (Exception e) {
            throw new RuntimeException(e);
        }
        viaje.setDescripcion(descripcion);
        return viaje;
    }
}
