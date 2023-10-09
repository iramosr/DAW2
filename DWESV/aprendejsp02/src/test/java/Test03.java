import com.daw2.aprendejsp02.entity.Encuesta;
import com.daw2.aprendejsp02.entity2.Actividad;
import com.daw2.aprendejsp02.entity2.Empleado;
import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.Persistence;

public class Test03 {
    public static void main(String[] args) {
        Empleado empleado = new Empleado();
        empleado.setNombre("Luisito");
        empleado.setApellidos("Pérez");

        Actividad actividad = new Actividad();
        actividad.setReferencia("123");
        actividad.setDescripcion("Viaje a Lisboa");
        actividad.setEmpleado(empleado);


        try {
            EntityManagerFactory emf = Persistence.createEntityManagerFactory("default");
            EntityManager em = emf.createEntityManager();
            em.getTransaction().begin();
            em.persist(empleado);
            em.persist(actividad);
            em.getTransaction().commit();
            em.close();
            emf.close();
        } catch (Exception ex) {
            System.err.println(ex.toString());
        }
    }
}
