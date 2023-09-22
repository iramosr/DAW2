package com.daw2.aprendejsp02.service;

import com.daw2.aprendejsp02.entity.Encuesta;
import jakarta.servlet.http.HttpServletRequest;

public class EncuestasService {
    public static Encuesta formToEntity(HttpServletRequest request){
        //  Map<String, String[]> formParams = request.getParameterMap();
        String nif = request.getParameter("nif").trim();
        String nombre = request.getParameter("nombre").trim();
        String apellido1 = request.getParameter("apellido1").trim();
        String apellido2 = request.getParameter("apellido2").trim();
        Encuesta encuesta = new Encuesta();
        encuesta.setNif(nif);
        encuesta.setNombre(nombre);
        encuesta.setApellido1(apellido1);
        encuesta.setApellido2(apellido2);
        return encuesta;
    }
}
