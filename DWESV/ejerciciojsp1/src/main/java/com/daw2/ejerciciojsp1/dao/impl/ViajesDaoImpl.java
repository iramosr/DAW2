package com.daw2.ejerciciojsp1.dao.impl;

import com.daw2.ejerciciojsp1.dao.ViajesDao;
import com.daw2.ejerciciojsp1.entity.Viaje;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

import java.util.List;

public class ViajesDaoImpl implements ViajesDao {
    private EntityManagerFactory emf;
    public ViajesDaoImpl(){
        try {
            emf = Persistence.createEntityManagerFactory("default");
        } catch (Exception e){
            e.printStackTrace();
        }
    }
    @Override
    public Long add(Viaje entity) {
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
    public Boolean add(List<Viaje> list) {
        boolean error = false;
        EntityManager em= emf.createEntityManager();
        try{
            em.getTransaction().begin();
            for (Viaje viaje: list){
                em.persist(viaje);
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
    public Boolean uptade(Viaje entity) {
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
    public Viaje get(long id) {
        return null;
    }

    @Override
    public List<Viaje> findAll() {
        List<Viaje> viajes;
        EntityManager em = emf.createEntityManager();
        viajes = em.createQuery("SELECT v FROM Viaje v",Viaje.class).getResultList();
        em.close();
        return viajes;
    }

    @Override
    public List<Viaje> findByCodigo(String codigo) {
        return null;
    }
}
