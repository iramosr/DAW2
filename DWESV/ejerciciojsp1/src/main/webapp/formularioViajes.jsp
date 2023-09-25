<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<form action="viajes/nuevo" method="post">
    <div class="card m-2">
        <div class="card-header text-center fw-bold">
            Nuevo Viaje
        </div>
        <div class="card-body bg-light-subtle">
            <div class="row mb-3">
                <div class="col-12 col-md-6 form-floating">
                    <input type="codigo" class="form-control" id="codigo" name="codigo" placeholder="Introduce el codigo">
                    <label for="codigo">Código</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input type="descripcion" class="form-control" id="descripcion" name="descripcion" placeholder="Introduce la descripción">
                    <label for="descripcion">Descripción</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="precio" class="form-control" id="precio" name="precio" placeholder="Introduce el precio">
                    <label for="precio">Precio</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="salida" class="form-control" id="salida" name="salida" placeholder="Introduce la salida">
                    <label for="salida">Salida</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="llegada" class="form-control" id="llegada" name="llegada" placeholder="Introduce la llegada">
                    <label for="llegada">Llegada</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input class="btn btn-dark float-end" name="btGuardar" type="submit" value="Guardar"/>
        </div>
    </div>
</form>