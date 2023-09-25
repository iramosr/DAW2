package com.daw2.ejerciciojsp1.service;

import com.daw2.ejerciciojsp1.entity.Viaje;
import jakarta.servlet.http.HttpServletRequest;

public class ViajesService {
    public static Viaje formToEntity(HttpServletRequest request) throws Exception {
        //  Map<String, String[]> formParams = request.getParameterMap();
        String codigo = request.getParameter("codigo").trim();
        String descripcion = request.getParameter("descripcion").trim();
        String precio = request.getParameter("precio").trim();
        String salida = request.getParameter("salida").trim();
        String llegada = request.getParameter("llegada").trim();
        Viaje viaje = new Viaje();
        viaje.setCodigo(codigo);
        viaje.setDescripcion(descripcion);
        viaje.setPrecio(precio);
        viaje.setSalida(salida);
        viaje.setLlegada(llegada);
        return viaje;
    }
}
