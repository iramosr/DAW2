package com.daw2.viajes.dao.impl;

import com.daw2.viajes.dao.EmpleadosDao;
import com.daw2.viajes.entity.Cliente;
import com.daw2.viajes.entity.Contratacion;
import com.daw2.viajes.entity.Empleado;
import com.daw2.viajes.entity.Viaje;
import jakarta.persistence.*;

import java.util.List;

public class EmpleadosDaoImpl implements EmpleadosDao {
    private EntityManagerFactory emf;
    public EmpleadosDaoImpl(){
        try {
            emf = Persistence.createEntityManagerFactory("default");
        } catch (Exception e){
            e.printStackTrace();
        }
    }
    @Override
    public Long add(Empleado entity) {
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
    public Boolean add(List<Empleado> list) {
        boolean error = false;
        EntityManager em= emf.createEntityManager();
        try{
            em.getTransaction().begin();
            for (Empleado empleado: list){
                em.persist(empleado);
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
    public Boolean update(Empleado entity) {
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
        boolean error = false;
        EntityManager em = emf.createEntityManager();
        try {
            Empleado empleado = em.find(Empleado.class, id);
            em.getTransaction().begin();
            if (empleado != null) {
                //Para borrar el empleado primero borro los viajes en los que está
                TypedQuery<Viaje> query = em.createQuery("SELECT v FROM Viaje v WHERE V.empleado = :empleado", Viaje.class);
                query.setParameter("empleado", empleado);
                List<Viaje> viajes = query.getResultList();
                for (Viaje viaje : viajes) {
                    em.remove(viaje);
                }
                em.remove(empleado);
                em.getTransaction().commit();
            } else {
                error = true;
                em.getTransaction().rollback();
            }
        } catch (Exception e) {
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
    public Empleado get(long id) {
        EntityManager em = emf.createEntityManager();
        Query query = em.createQuery("SELECT e FROM Empleado e WHERE e.id=:id",Empleado.class);
        query.setParameter("id", id);
        Empleado empleado = (Empleado) query.getSingleResult();
        em.close();
        return empleado;
    }

    @Override
    public List<Empleado> findAll() {
        List<Empleado> empleados;
        EntityManager em = emf.createEntityManager();
        empleados = em.createQuery("SELECT e FROM Empleado e",Empleado.class).getResultList();
        em.close();
        return empleados;
    }

    @Override
    public List<Empleado> findByNif(String nif) {
        return null;
    }
}
