<?php

namespace controllers;

use dao\ContratacionesDao;
use dao\RolesDao;
use dao\UsuariosDao;
use dao\ViajesDao;
use libs\Controller;
use services\LogService;


class ContratacionesController extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $daoContrataciones = new ContratacionesDao();
        $usuarioSesion = $_SESSION['usuario'] ?? null;
        $contrataciones = $daoContrataciones->getByUser($usuarioSesion['id']) ?? [];
        $daoViajes = new ViajesDao();
        $viajes = $daoViajes->listAll();
        $daoUsuarios = new UsuariosDao();
        $clientes = $daoUsuarios->getByRol('CLIENTE');
        $this->data['accion'] = BASE_URL . "/contrataciones/store";
        $this->data['title-btn-submit'] = 'Guardar';
        $this->data['contrataciones'] = $contrataciones;
        $this->data['viajes'] = $viajes;
        $this->data['clientes'] = $clientes;
        $this->data['page-title'] = "LISTADO DE CONTRATACIONES";
        $this->view->render('main/contrataciones/index', $this->data);
    }

    function emple()
    {
        $this->filterAccess('EMPLE');
        $daoContrataciones = new ContratacionesDao();
        $contrataciones = $daoContrataciones->listAll();
        $daoViajes = new ViajesDao();
        $viajes = $daoViajes->listAll();
        $daoUsuarios = new UsuariosDao();
        $clientes = $daoUsuarios->getByRol('CLIENTE');
        $this->data['accion'] = BASE_URL . "/contrataciones/store";
        $this->data['title-btn-submit'] = 'Guardar';
        $this->data['contrataciones'] = $contrataciones;
        $this->data['viajes'] = $viajes;
        $this->data['clientes'] = $clientes;
        $this->data['page-title'] = "LISTADO DE CONTRATACIONES";
        $this->view->render('admin/contrataciones/index', $this->data);
    }


    public function store()
    {
        $this->filterAccess('CLIENTE');
        $contratacion = [];

        $contratacion['viaje_id'] = $_POST['viaje_id'] ?? null;
        $contratacion['cliente_id'] = $_POST['cliente_id'] ?? null;
        $contratacion['pagado'] = $_POST['pagado'] ?? null;

        $dao = new ContratacionesDao();
        $contratacionId = $dao->add($contratacion);
        if ($contratacionId != null) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Contratacion guardada";
            LogService::info("Contratacion creada: " . $contratacion['viaje_id'] . " - " . $contratacion['cliente_id']);
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Contratacion no guardada";
            LogService::error("Contratacion NO creada: " . $contratacion['viaje_id'] . " - " . $contratacion['cliente_id']);
        }
        $_SESSION['result'] = $this->data['result'];

        $rolesDao = new RolesDao();
        $roles = $rolesDao->roles($_SESSION['usuario']['id']);
        if (in_array('EMPLE', $roles)) {
            header("Location: " . BASE_URL . "/contrataciones/emple");
        } else {
            header("Location: " . BASE_URL . "/contrataciones");
        }
    }


    public function show($values)
    {
        $id = $values[0];
        $dao = new ContratacionesDao();
        $contratacion = $dao->get($id);
        if ($contratacion) {
            $this->data['contratacion'] = $contratacion;
            $this->data['page-title'] = "CONSULTA DE LA CONTRATACION";
            $this->data['readonly'] = 'readonly';
            $this->data['disabled'] = 'disabled';
            $this->data['accion'] = BASE_URL . "/contrataciones/emple/";
            $this->data['title-btn-submit'] = 'Volver';
            LogService::info("Contratacion vista: " . $contratacion['id']);
        }
        $this->view->render('admin/contrataciones/show', $this->data);
    }

    public function delete($values)
    {
        {
            $id = $values[0];

            $dao = new ContratacionesDao();

            if ($dao->delete($id)) {
                $this->data['result']['type'] = 'success';
                $this->data['result']['msg'] = "Contratación eliminada";
                LogService::info("Contratacion borrada: " . $id);
            } else {
                $this->data['result']['type'] = 'error';
                $this->data['result']['msg'] = "Contratación no eliminada";
                LogService::info("Contratacion NO borrada: " . $id);
            }
            $rolesDao = new RolesDao();
            $roles = $rolesDao->roles($_SESSION['usuario']['id']);
            if (in_array('EMPLE', $roles)) {
                $this->emple();
            } else {
                $this->index();
            }
        }
    }

    public function update($values)
    {
        $id = $values[0];
        $dao = new ContratacionesDao();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contratacion = [];
            $contratacion['viaje_id'] = $_POST['viaje_id'] ?? null;
            $contratacion['cliente_id'] = $_POST['cliente_id'] ?? null;
            $contratacion['pagado'] = $_POST['pagado'] ?? null;

            if ($dao->update($id, $contratacion)) {
                $this->data['result']['type'] = 'success';
                $this->data['result']['msg'] = 'Contratacion actualizada';

            } else {
                $this->data['result']['type'] = 'error';
                $this->data['result']['msg'] = 'No se pudo actualizar la contratacion';
            }
        }

        $contratacion = $dao->get($id);
        if ($contratacion) {
            $this->data['contratacion'] = $contratacion;
            LogService::info("Contratacion actualizada " . $contratacion['id']);
        }

        $daoViajes = new ViajesDao();
        $viajes = $daoViajes->listAll();
        $daoUsuarios = new UsuariosDao();
        $clientes = $daoUsuarios->getByRol('CLIENTE');
        $this->data['viajes'] = $viajes;
        $this->data['clientes'] = $clientes;
        $this->data['accion'] = BASE_URL . "/contrataciones/update/" . $id;
        $this->data['title-btn-submit'] = 'Cambiar';


        $rolesDao = new RolesDao();
        $roles = $rolesDao->roles($_SESSION['usuario']['id']);
        if (in_array('EMPLE', $roles)) {
            $this->view->render('admin/contrataciones/update', $this->data);
        } else {
            $this->view->render('main/contrataciones/update', $this->data);
        }
    }
}