package com.daw2.aprendejsp02.dao.impl;

import com.daw2.aprendejsp02.dao.EncuestasDao;
import com.daw2.aprendejsp02.entity.Encuesta;
import jakarta.persistence.*;

import java.util.List;

public class EncuestasDaoImpl  implements EncuestasDao {
    private EntityManagerFactory emf;
    public EncuestasDaoImpl(){
try {
    emf = Persistence.createEntityManagerFactory("default");
    } catch (Exception e){
     e.printStackTrace();
    }
}
    @Override
    public Long add(Encuesta entity) {
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
    public Boolean add(List<Encuesta> list) {
        boolean error = false;
        EntityManager em= emf.createEntityManager();
        try{
            em.getTransaction().begin();
                for (Encuesta encuesta: list){
                    em.persist(encuesta);
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
    public Boolean update(Encuesta entity) {
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
            Encuesta encuesta = em.find(Encuesta.class, id);
            em.getTransaction().begin();
            em.remove(encuesta);
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
    public Encuesta get(long id) {
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT e FROM Encuesta e WHERE e.id=:id",Encuesta.class);
        query.setParameter("id", id);
        Encuesta encuesta = (Encuesta) query.getSingleResult();
        em.close();
        return encuesta;
    }

    @Override
    public List<Encuesta> findAll() {
        List<Encuesta> encuestas;
        EntityManager em = emf.createEntityManager();
        encuestas = em.createQuery("SELECT e FROM Encuesta e",Encuesta.class).getResultList();
        em.close();
        return encuestas;
    }

    @Override
    public List<Encuesta> findByNif(String nif) {
        return null;
    }
}
