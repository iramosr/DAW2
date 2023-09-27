package com.daw2.ejerciciojsp1.service;

import com.daw2.ejerciciojsp1.entity.Viaje;
import jakarta.servlet.http.HttpServletRequest;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class ViajesService {
    public static Viaje formToEntity(HttpServletRequest request){
        //  Map<String, String[]> formParams = request.getParameterMap();
        Long id = null;
        try {
            id = Long.parseLong(request.getParameter("id").trim());
        }catch (Exception ex){}
        String codigo = request.getParameter("codigo").trim();
        String descripcion = request.getParameter("descripcion").trim();
        String precio = request.getParameter("precio").trim();
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
        Viaje viaje = new Viaje();
        viaje.setId(id);
        viaje.setCodigo(codigo);
        viaje.setDescripcion(descripcion);
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
        return viaje;
    }
}
