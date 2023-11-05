# Proyecto viajes - Ismael Ramos

+ Cambios respecto al original
    1. El botón que muestra los detalles de los viajes tanto de un cliente como de un empleado no aparece directamente
       en la tabla, si no que primero hay que acceder a los datos de dicha persona (botón de ver) en el cual si esta
       persona dispone de algun viaje se mostrará un botón para verlo (Añadido propio 1)

+ Añadidos propios
    1. Se ha añadido un botón al ver los detalles de un cliente o un empleado que despliega una tabla con los detalles
       del viaje para ambos además de la cantidad pagada y a pagar en el caso del cliente. Este botón solo se muestra en
       aquellas personas que tienen viajes, es decir, si un cliente no ha contratado un viaje o un empleado no tiene
       ningún viaje asignado este botón no se mostrará.
    2. Se ha añadido un botón en la tabla de viajes que muestra las contrataciones del viaje, funciona igual que el
       anterior, solo se mostrará si el viaje tiene contrataciones.
    3. Al desplegar la descripción de un viaje, cambia el icono del boton utilizado para desplegarla
+ Aspectos a tener en cuenta
    1. Para no mostrar errores al eliminar registros que son foreign keys en otras tablas, he decidido que al eliminar
       un cliente o un viaje se eliminen todas las contrataciones asociadas a este, los viajes que tenga un empleado. En
       los 2 primeros casos no tiene mayor problema pero al eliminar un empleado se debe tomar en cuenta que si no se
       quieren perder todos los datos del viaje, primero habrá que modificar el empleado encargado de este.

