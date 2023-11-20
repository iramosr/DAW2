<?php

namespace controllers;

use dao\ViajesDao;
use libs\Controller;
use services\LogService;


class ViajesController extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->filterAccess('CLIENTE');
        $dao = new ViajesDao();
        $viajes = $dao->listAll();
        $this->data['accion'] = BASE_URL."/viajes/store";
        $this->data['title-btn-submit'] = 'Guardar';
        $this->data['viajes'] = $viajes;
        $this->data['page-title'] = "LISTADO DE VIAJES";
        $this->view->render('main/viajes/index', $this->data);

    }

    public function store(){
        $this->filterAccess('EMPLE');
        $viaje = [];

        $viaje['codigo']=$_POST['codigo'] ?? null;
        $viaje['titulo']=$_POST['titulo'] ?? null;
        $viaje['descripcion'] =$_POST['descripcion'] ?? null;
        $viaje['salida'] = $_POST['salida'] ?? null;
        $viaje['llegada'] = $_POST['llegada'] ?? null;
        $viaje['plazas'] = $_POST['plazas'] ?? null;
        $viaje['precio'] = $_POST['precio'] ?? null;

        if ($_FILES['foto'] && $_FILES['foto']['name'] != '') {
            $foto = $_FILES['foto'];
            $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
            $nameFoto = uniqid() . '-' . $viaje['codigo'].".".$extension;
            $localPathImagen = fullPath(UPLOAD_FOTOS_VIAJES, $nameFoto);
            move_uploaded_file($foto['tmp_name'], $localPathImagen);
            $viaje['foto'] = $nameFoto;
        }

        $empleadoId = $data['empleado_id'] ?? null;


        $dao = new ViajesDao();
        $viajeId = $dao->add($viaje);
        if ($viajeId != null) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Viaje guardado";
            LogService::info("Viaje creado: ".$viaje['codigo']);
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Viaje no guardado";
            LogService::error("Viaje NO creado: ".$viaje['codigo']);
        }
        $_SESSION['result'] = $this->data['result'];
header("Location: " . BASE_URL . "/viajes/index");
    }


    //PASANDO CODIGO VIAJE
    public function show($values){
        $this->filterAccess('EMPLE');
        $codigo = $values[0];
        $dao = new ViajesDao();
        $viaje = $dao->getByCodigo($codigo);
        $this->data['viaje'] = $viaje;
        $this->data['page-title'] = "CONSULTA DEL VIAJE";
        $this->data['readonly'] = 'readonly';
        $this->data['disabled'] = 'disabled';
        $this->data['accion'] = BASE_URL."/viajes/index/";
        $this->data['title-btn-submit'] = 'Volver';
        $this->view->render('admin/viajes/show', $this->data);
    }

    public function delete($values){
        {
            $id = $values[0];

            $dao = new ViajesDao();

            if ($dao->delete($id)) {
                $this->data['result']['type'] = 'success';
                $this->data['result']['msg'] = "Viaje eliminado";
                LogService::info("Viaje borrado: ".$id);
            } else {
                $this->data['result']['type'] = 'error';
                $this->data['result']['msg'] = "Viaje no eliminado";
                LogService::info("Viaje NO borrado: ".$id);
            }
            $this->index();
        }
    }
    public function update($values)
    {
        $id = $values[0];
        $dao = new ViajesDao();
        $viajeBD = $dao->get($id);
        if ($_SERVER['REQUEST_METHOD']=== 'POST'){

            $viaje = [];
            $viaje['codigo'] = $_POST['codigo'] ?? null;
            $viaje['titulo'] = $_POST['titulo'] ?? null;
            $viaje['descripcion'] = $_POST['descripcion'] ?? null;
            $viaje['salida'] = $_POST['salida'] ?? null;
            $viaje['llegada'] = $_POST['llegada'] ?? null;
            $viaje['plazas'] = $_POST['plazas'] ?? null;
            $viaje['precio'] = $_POST['precio'] ?? null;
            $viaje['foto'] = $_POST['foto'] ?? null;
            $viaje['empleado_id'] = $_POST['empleado_id'] ?? null;

            if ($dao->update($id, $viaje)) {
                $this->data['result']['type'] = 'success';
                $this->data['result']['msg'] = 'Viaje actualizado';

            } else {
                $this->data['result']['type'] = 'error';
                $this->data['result']['msg'] = 'No se pudo actualizar el viaje';
            }
        }

        $viaje=$dao->get($id);
        if ($viaje) {
            $this->data['viaje'] = $viaje;
            LogService::info("Viaje actializado: ".$viaje['codigo']);
        }
        $this->data['accion'] = BASE_URL."/viajes/update/".$id;
        $this->data['title-btn-submit'] = 'Cambiar';
        $this->view->render('admin/viajes/update', $this->data);
    }
}