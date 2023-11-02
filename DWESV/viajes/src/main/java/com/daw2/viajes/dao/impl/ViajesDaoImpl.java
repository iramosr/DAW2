package com.daw2.viajes.dao.impl;

import com.daw2.viajes.dao.ViajesDao;
import com.daw2.viajes.entity.Viaje;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;
import jakarta.persistence.Query;

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
    public Boolean update(Viaje entity) {
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
            Viaje viaje = em.find(Viaje.class, id);
            em.getTransaction().begin();
            em.remove(viaje);
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
    public Viaje get(long id){
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT v FROM Viaje v WHERE v.id=:id",Viaje.class);
        query.setParameter("id", id);
        Viaje viaje = (Viaje) query.getSingleResult();
        em.close();
        return viaje;
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
    public Viaje findByCodigo(String codigo) {

        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT v FROM Viaje v WHERE v.codigo=:codigo",Viaje.class);
        query.setParameter("codigo", codigo);
        Viaje viaje = (Viaje) query.getSingleResult();
        em.close();
        return viaje;
    }

    @Override
    public List<Viaje> findByIdCliente(Long idCliente) {
        List<Viaje> viajes;
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT v FROM Viaje v INNER JOIN Contratacion c ON v.id=c.viaje.id WHERE c.cliente.id=:idCliente",Viaje.class);
        query.setParameter("idCliente", idCliente);
        viajes = query.getResultList();
        em.close();
        return viajes;
    }

    @Override
    public List<Viaje> findByIdEmpleado(Long idEmpleado) {
        List<Viaje> viajes;
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT v FROM Viaje v WHERE v.empleado.id=:idEmpleado",Viaje.class);
        query.setParameter("idEmpleado", idEmpleado);
        viajes = query.getResultList();
        em.close();
        return viajes;
    }
}
