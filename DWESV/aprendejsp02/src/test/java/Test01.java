import com.daw2.aprendejsp02.entity.Encuesta;
import jakarta.persistence.Entity;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

public class Test01 {
    public static void main(String[] args) {
        Encuesta encuesta = new Encuesta();
        encuesta.setNif("pepito12@gmail.com");
        encuesta.setNif("123A");
        encuesta.setNombre("Pepito");
        encuesta.setApellido1("Pérez");

        try {
            EntityManagerFactory emf = Persistence.createEntityManagerFactory("default");
            EntityManager em = emf.createEntityManager();
            em.getTransaction().begin();
            em.persist(encuesta);
            em.getTransaction().commit();
            em.close();
            emf.close();
        } catch (Exception ex) {
            System.err.println(ex.toString());
        }
    }
}
