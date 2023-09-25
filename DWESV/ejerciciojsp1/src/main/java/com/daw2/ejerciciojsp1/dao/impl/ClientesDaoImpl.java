package com.daw2.ejerciciojsp1.dao.impl;

import com.daw2.ejerciciojsp1.dao.ClientesDao;
import com.daw2.ejerciciojsp1.entity.Cliente;
import jakarta.persistence.Entity;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

import java.util.List;

public class ClientesDaoImpl implements ClientesDao {
    private EntityManagerFactory emf;
    public ClientesDaoImpl(){
        try {
            emf = Persistence.createEntityManagerFactory("default");
        } catch (Exception e){
            e.printStackTrace();
        }
    }
    @Override
    public Long add(Cliente entity) {
        Long id =null;
        EntityManager em = emf.createEntityManager();
        try {
            em.getTransaction().begin();
            em.persist(entity);
            em.flush();
            em.getTransaction().commit();
            id = entity.getId();
        }catch (Exception e){
            em.getTransaction().rollback();
            // e.printStackTrace();
        }finally {
            em.close();
        }
        return id;
    }

    @Override
    public Boolean add(List<Cliente> list) {
        boolean error = false;
        EntityManager em= emf.createEntityManager();
        try{
            em.getTransaction().begin();
            for (Cliente cliente: list){
                em.persist(cliente);
                em.flush();
            }
            em.getTransaction().commit();
        }catch (Exception e){
            error = true;
            em.getTransaction().rollback();
        }finally {
            em.close();
        }
        return error;
    }

    @Override
    public Boolean uptade(Cliente entity) {
        return null;
    }

    @Override
    public Boolean delete(long id) {
        return null;
    }

    @Override
    public Boolean deleteAll() {
        return null;
    }

    @Override
    public Cliente get(long id) {
        return null;
    }

    @Override
    public List<Cliente> findAll() {
        List<Cliente> clientes;
        EntityManager em = emf.createEntityManager();
        clientes = em.createQuery("SELECT c FROM Cliente c",Cliente.class).getResultList();
        em.close();
        return clientes;
    }

    @Override
    public List<Cliente> findByNif(String nif) {
        return null;
    }
}
