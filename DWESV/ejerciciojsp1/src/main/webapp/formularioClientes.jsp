<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<form action="clientes/nuevo" method="post">
    <div class="card m-2">
        <div class="card-header text-center fw-bold">
            Nuevo Cliente
        </div>
        <div class="card-body bg-light-subtle">
            <div class="row mb-3">
                <div class="col-12 col-md-6 form-floating">
                    <input type="nif" class="form-control" id="nif" name="nif" placeholder="Introduce el NIF">
                    <label for="nif">NIF</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email">
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 form-floating">
                    <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="apellido1" class="form-control" id="apellido1" name="apellido1" placeholder="Introduce tu primer apellido">
                    <label for="apellido1">Apellido 1</label>
                </div>
                <div class="col-12 col-md-4 form-floating">
                    <input type="apellido2" class="form-control" id="apellido2" name="apellido2" placeholder="Introduce tu segundo apellido">
                    <label for="apellido2">Apellido 2</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input class="btn btn-dark float-end" name="btGuardar" type="submit" value="Guardar"/>
        </div>
    </div>
</form>