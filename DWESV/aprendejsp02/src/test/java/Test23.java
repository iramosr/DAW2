import com.daw2.aprendejsp02.entity2.Actividad;
import com.daw2.aprendejsp02.entity2.Empleado;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

import java.util.List;

public class Test23 {
    public static void main(String[] args) {
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("default");

        try {
            EntityManager em = emf.createEntityManager();

            //Carga el empleado con id 1
            Empleado empleado = em.find(Empleado.class, 2L);


//            Empleado empleado = em.createQuery("SELECT e FROM Empleado e WHERE e.id=:id", Empleado.class)
//                    .setParameter("id",1).getSingleResult();

            if (empleado != null) {
                System.out.println(empleado);
                System.out.println("Empleado: " + empleado.getNombre());
                for (Actividad actividad : empleado.getActividades()) {
                    System.out.println("\t" + actividad.getDescripcion());
                }
            } else {
                System.out.println("No existe el empleado");
            }

            em.close();
        } catch (Exception ex) {
        }
    }
}