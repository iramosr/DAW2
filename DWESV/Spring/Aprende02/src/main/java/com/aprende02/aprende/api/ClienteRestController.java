package com.aprende02.aprende.api;

import com.aprende02.aprende.model.entity.Cliente;
import com.aprende02.aprende.service.ClientesService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@CrossOrigin("*")
@RestController
@RequestMapping("/api/clientes")
public class ClienteRestController {
    @Autowired
    private ClientesService clientesService;

    @GetMapping("")
    public List<Cliente> getAll(){
        List<Cliente> clientes = clientesService.findAll();
        return clientes;
    }

    @GetMapping("/test1")
    public Cliente saveTest(){
        Cliente cliente = new Cliente();
        cliente.setNif("123"+(int)(Math.random()*100));
        cliente.setNombre("Pepito");
        cliente.setApellido1("Perez");
        clientesService.save(cliente);
        return cliente;
    }

}
