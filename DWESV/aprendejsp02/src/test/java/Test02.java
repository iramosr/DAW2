import com.daw2.aprendejsp02.entity.Encuesta;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

import java.util.List;

public class Test02 {
    public static void main(String[] args) {
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("default");
        List<Encuesta> encuestas = null;
        try {
            EntityManager em = emf.createEntityManager();
            encuestas = em.createQuery("SELECT e FROM Encuesta e", Encuesta.class).getResultList();
            System.out.println(encuestas.toString());
            em.close();
        }catch (Exception ex){
            System.err.println(ex.toString());
        }
    }
}
