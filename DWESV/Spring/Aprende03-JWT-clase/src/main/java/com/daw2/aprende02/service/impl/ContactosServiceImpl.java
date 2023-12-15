package com.daw2.aprende02.service.impl;


import com.daw2.aprende02.model.entity.Contacto;
import com.daw2.aprende02.model.repository.ContactosRepository;
import com.daw2.aprende02.service.ContactosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;

@Service
public class ContactosServiceImpl implements ContactosService {
    @Autowired
    private ContactosRepository contactosRepository;

    @Transactional(readOnly = true)
    @Override
    public List<Contacto> findAll(String filtro) {
        if (filtro==null)
            return contactosRepository.findAll();
        else {
//            List contactos =  contactosRepository.findByNombreContaining(filtro);
            List contactos =  contactosRepository.findByNombreLike("%"+filtro+"%");
            return contactos;
        }
    }

    @Transactional(readOnly = true)
    public Contacto findById(long id) {
        return contactosRepository.findById(id).get();
    }

    @Transactional
    @Override
    public Contacto save(Contacto contacto) {
        return contactosRepository.save(contacto);
    }

    @Override
    public void delete(long id) {
        contactosRepository.deleteById(id);
    }

    @Override
    public Contacto update(long id, Contacto contacto) {
        Contacto contactoBD = contactosRepository.findById(id).get();
        if (contacto!=null) {
            contactoBD.setNombre(contacto.getNombre());
            contactoBD.setApellidos(contacto.getApellidos());
            contactosRepository.save(contactoBD);
        }
        return contacto;

    }
}
