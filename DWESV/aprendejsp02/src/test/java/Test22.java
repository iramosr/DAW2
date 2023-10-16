import com.daw2.aprendejsp02.entity2.Actividad;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

import java.util.List;

public class Test22 {
    public static void main(String[] args) {
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("default");
        List<Actividad> actividades = null;
        try {
            EntityManager em = emf.createEntityManager();
            actividades = em.createQuery("SELECT a FROM Actividad a", Actividad.class).getResultList();

            for (Actividad actividad : actividades) {
                System.out.println(actividad);
            }
            em.close();
        } catch (Exception ex) {

        }
    }

}
