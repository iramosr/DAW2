package com.daw2.ejerciciojsp1.dao.impl;

import com.daw2.ejerciciojsp1.dao.ClientesDao;
import com.daw2.ejerciciojsp1.entity.Cliente;
import jakarta.persistence.*;

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
    public Boolean update(Cliente entity) {
        boolean error = false;
        EntityManager em = emf.createEntityManager();
        try {
            em.getTransaction().begin();
            em.merge(entity);
            em.flush();
            em.getTransaction().commit();
        }catch (Exception e){
            error = true;
            em.getTransaction().rollback();
        }finally {
            em.close();
        }

        return !error;
    }

    @Override
    public Boolean delete(long id) {
        boolean error=false;
        EntityManager em = emf.createEntityManager();
        try {
            Cliente cliente = em.find(Cliente.class, id);
            em.getTransaction().begin();
            em.remove(cliente);
            em.getTransaction().commit();
        }catch (Exception e){
            error = true;
            em.getTransaction().rollback();
        } finally {
            em.close();
        }
        return !error;
    }

    @Override
    public Boolean deleteAll() {
        return null;
    }

    @Override
    public Cliente get(long id) {
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT c FROM Cliente c WHERE c.id=:id",Cliente.class);
        query.setParameter("id", id);
        Cliente cliente = (Cliente) query.getSingleResult();
        em.close();
        return cliente;
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
