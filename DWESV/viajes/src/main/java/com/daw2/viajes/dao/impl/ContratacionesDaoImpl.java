package com.daw2.viajes.dao.impl;

import com.daw2.viajes.dao.ContratacionesDao;
import com.daw2.viajes.entity.Contratacion;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;
import jakarta.persistence.Query;

import java.util.List;

public class ContratacionesDaoImpl implements ContratacionesDao {
    private EntityManagerFactory emf;
    public ContratacionesDaoImpl(){
        try {
            emf = Persistence.createEntityManagerFactory("default");
        } catch (Exception e){
            e.printStackTrace();
        }
    }
    @Override
    public Long add(Contratacion entity) {
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
    public Boolean add(List<Contratacion> list) {
        boolean error = false;
        EntityManager em= emf.createEntityManager();
        try{
            em.getTransaction().begin();
            for (Contratacion contratacion: list){
                em.persist(contratacion);
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
    public Boolean update(Contratacion entity) {
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
            Contratacion contratacion = em.find(Contratacion.class, id);
            em.getTransaction().begin();
            em.remove(contratacion);
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
    public Contratacion get(long id){
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT c FROM Contratacion c WHERE c.id=:id",Contratacion.class);
        query.setParameter("id", id);
        Contratacion contratacion = (Contratacion) query.getSingleResult();
        em.close();
        return contratacion;
    }

    @Override
    public List<Contratacion> findAll() {
        List<Contratacion> contrataciones;
        EntityManager em = emf.createEntityManager();
        contrataciones = em.createQuery("SELECT c FROM Contratacion c",Contratacion.class).getResultList();
        em.close();
        return contrataciones;
    }

    @Override
    public List<Contratacion> findByIdViaje(Long idviaje) {
        List<Contratacion> contrataciones;
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT c FROM Contratacion c WHERE c.viaje.id=:idviaje",Contratacion.class);
        query.setParameter("idviaje", idviaje);
        contrataciones = query.getResultList();
        em.close();
        return contrataciones;
    }

    @Override
    public List<Contratacion> findByIdCliente(Long idcliente) {
        List<Contratacion> contrataciones;
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT c FROM Contratacion c WHERE c.cliente.id=:idcliente",Contratacion.class);
        query.setParameter("idcliente", idcliente);
        contrataciones = query.getResultList();
        em.close();
        return contrataciones;
    }
}
