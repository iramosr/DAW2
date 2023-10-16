import com.daw2.aprendejsp02.entity2.Actividad;
import com.daw2.aprendejsp02.entity2.Empleado;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

import java.util.List;

public class Test24 {
    public static void main(String[] args) {
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("default");

        try {
            EntityManager em = emf.createEntityManager();

            //Carga los empleados
            List<Empleado> empleados = em.createQuery("SELECT e FROM Empleado e", Empleado.class).getResultList();

            if (empleados != null) {
                for (Empleado empleado : empleados) {
                    System.out.println(empleado);
                    System.out.println("Empleado: " + empleado.getNombre());
                    for (Actividad actividad : empleado.getActividades()) {
                        System.out.println("\t" + actividad.getDescripcion());
                    }
                }
            }
            em.close();
        } catch (Exception ex) {
        }
    }
}