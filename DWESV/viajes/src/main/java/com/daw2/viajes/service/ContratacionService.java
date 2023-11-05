package com.daw2.viajes.service;


import com.daw2.viajes.entity.Contratacion;
import com.daw2.viajes.entity.Viaje;
import com.daw2.viajes.entity.Cliente;
import com.daw2.viajes.dao.impl.ViajesDaoImpl;
import com.daw2.viajes.dao.impl.ClientesDaoImpl;
import jakarta.servlet.http.HttpServletRequest;


public class ContratacionService {
    public static Contratacion formToEntity(HttpServletRequest request){
        ViajesDaoImpl viajesDao = new ViajesDaoImpl();
        ClientesDaoImpl clientesDao = new ClientesDaoImpl();


        //  Map<String, String[]> formParams = request.getParameterMap();
        Long id = null;
        try {
            id = Long.parseLong(request.getParameter("id").trim());
        }catch (Exception ex){}
        String idviaje = request.getParameter("viajeId").trim();
        String idcliente = request.getParameter("clienteId").trim();
        Double pagado = Double.parseDouble(request.getParameter("pagado").trim());
        Viaje viaje = viajesDao.get(Long.parseLong(idviaje));
        Cliente cliente = clientesDao.get(Long.parseLong(idcliente));


        Contratacion contratacion = new Contratacion();
        contratacion.setId(id);
        contratacion.setViaje(viaje);
        contratacion.setCliente(cliente);
        contratacion.setPagado(pagado);

        return contratacion;
    }
}
