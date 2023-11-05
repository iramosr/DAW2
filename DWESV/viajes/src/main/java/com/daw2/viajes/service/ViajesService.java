package com.daw2.viajes.service;

import com.daw2.viajes.dao.impl.EmpleadosDaoImpl;
import com.daw2.viajes.entity.Empleado;
import com.daw2.viajes.entity.Viaje;

import jakarta.servlet.http.HttpServletRequest;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

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
        Double plazas = Double.parseDouble(request.getParameter("plazas").trim());

        //Fechas
        Date salida = null;
        try {
            // Obtener la fecha de salida del formulario
            String inputSalida = request.getParameter("salida");
            // Reemplazar la T por un espacio en blanco y poner 00 en los segundos
            String stringSalida = inputSalida.replace("T", " ") + ":00";
            // Convertir la fecha de salida a un objeto Date
            salida =  new SimpleDateFormat("yyyy-MM-dd HH:mm:ss").parse(stringSalida);
        } catch (ParseException e) {
            throw new RuntimeException(e);
        }



        Date llegada = null;
        try {
            // Obtener la fecha de salida del formulario
            String inputLlegada = request.getParameter("llegada");
            // Reemplazar la T por un espacio en blanco y poner 00 en los segundos
            String stringLlegada = inputLlegada.replace("T", " ") + ":00";
            System.out.println(stringLlegada);
            // Convertir la fecha de salida a un objeto Date
            llegada =  new SimpleDateFormat("yyyy-MM-dd HH:mm:ss").parse(stringLlegada);
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
        viaje.setPlazas(plazas);
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
