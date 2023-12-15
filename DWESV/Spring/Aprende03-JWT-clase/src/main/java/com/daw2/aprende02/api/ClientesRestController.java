package com.daw2.aprende02.api;

import com.daw2.aprende02.model.entity.Cliente;
import com.daw2.aprende02.service.ClientesService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@CrossOrigin("*")
@RestController
@RequestMapping("/api/clientes")
public class ClientesRestController {
    @Autowired
    private ClientesService clientesService;

    @GetMapping("/byNif/{nif}")
    public ResponseEntity<?> getByNif(@PathVariable String nif) {

        Cliente cliente = clientesService.findByNif(nif);

        if (cliente!=null) {
                return ResponseEntity
                        .status(HttpStatus.OK)
                        .body(cliente);
        }

        return ResponseEntity
                .status(HttpStatus.NOT_FOUND)
                .body("Cliente no encontrado");

    }

    @GetMapping("")
    public List<Cliente> getAll() {
        List<Cliente>  clientes = clientesService.findAll();
        return clientes;
    }

    /*
    {"nif":"123",
"nombre":"Pepito",
"apellido1":"Pérez"}
     */
    @PostMapping("")
    public ResponseEntity<?> save(@RequestBody Cliente cliente) {
        try {
            clientesService.save(cliente);
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(cliente);
        } catch ( Exception ex) {
            return ResponseEntity
                    .status(HttpStatus.BAD_REQUEST)
                    .body("Cliente no guardado");
        }
    }
}
