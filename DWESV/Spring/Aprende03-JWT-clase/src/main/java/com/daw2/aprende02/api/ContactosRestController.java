package com.daw2.aprende02.api;

import com.daw2.aprende02.model.entity.Contacto;
import com.daw2.aprende02.service.ContactosService;
import com.daw2.aprende02.service.impl.ContactosServiceImpl;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;


@CrossOrigin("*")
@RestController
@RequestMapping("/contactos")
public class ContactosRestController {
    @Autowired
    private ContactosServiceImpl contactosService;



    @GetMapping("")
    public List<Contacto> getAll(String nombre) {
        List<Contacto>  contactos = contactosService.findAll(nombre);
        return contactos;
    }

    @GetMapping("/{id}")
    public Contacto show(@PathVariable long id) {
        Contacto contacto = contactosService.findById(id);
        return contacto;
    }


    @PostMapping
    public ResponseEntity<?> save(@RequestBody Contacto contacto) {
        try {
            contactosService.save(contacto);
            return new ResponseEntity<>(contacto, HttpStatus.OK);
        } catch (Exception ex) {
            return new ResponseEntity<>("Contacto no guardado", HttpStatus.BAD_REQUEST);
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<?> delete(@PathVariable long id) {
        try {
            contactosService.delete(id);
            return new ResponseEntity<>("Contacto borrado", HttpStatus.OK);
        } catch (Exception ex) {
            return new ResponseEntity<>("Contacto no borrado", HttpStatus.BAD_REQUEST);
        }
    }

    @PutMapping("/{id}")
    public ResponseEntity<?> update(@PathVariable long id, @RequestBody Contacto contacto) {
        try {
            contactosService.update(id,contacto);
            return new ResponseEntity<>(contacto, HttpStatus.OK);
        } catch (Exception ex) {
            return new ResponseEntity<>("Contacto no modificado", HttpStatus.BAD_REQUEST);
        }
    }

    @GetMapping("/genera")
    public Contacto saveTest() {
        Contacto  contacto = new Contacto();
        contacto.setNombre("Pepito"+(int)(Math.random()*100));
        contacto.setApellidos("Pérez López");
        contactosService.save(contacto);
        return contacto;
    }

}
