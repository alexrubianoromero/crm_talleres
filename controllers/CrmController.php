<?php

namespace controllers;
use views\CrmView;
use models\ClientsModel;
use models\UsuarioModel;
class CrmController
{
    protected $view;
    protected $model;
    protected $modelUsuario;

    public function __construct()
    {   
        // if(!$_SESSION['usuario'])
        // {
        //     $this->pantallaLogueo();
        // }
        // else
        // {
            $this->view = new CrmView();
            $this->model = new ClientsModel();
            $this->modelUsuario = new UsuarioModel();

            if(!isset($_REQUEST['option'])){
                $this->mainView();
            }
            if($_REQUEST['option']=='showClients'){
                $this->showClients();
            }
            if($_REQUEST['option']=='showClientsFilter'){
                // echo '<pre>'; 
                // print_r($_REQUEST); 
                // echo '</pre>';
                $this->showClientsFilter($_REQUEST);
            }
        
            if($_REQUEST['option']=='askNew'){
                $this->askNew();
            }
            if($_REQUEST['option']=='saveClient'){
                $this->saveClient($_REQUEST);
            }
            
            if($_REQUEST['option']=='newFollow'){
                // echo '<pre>'; 
                // print_r($_REQUEST);
                // echo '</pre>';
                
                $this->newFollow($_REQUEST);
            }
            if($_REQUEST['option']=='saveFollow'){
                $this->saveFollow($_REQUEST);
            }
            if($_REQUEST['option']=='showFollows'){
                $this->showFollows($_REQUEST);
            }
            if($_REQUEST['option']=='showInfoClient'){
                $this->showInfoClient($_REQUEST);
            }
            if($_REQUEST['option']=='actualizarTaller'){
                $this->actualizarTaller($_REQUEST);
            }
            if($_REQUEST['option']=='verificarCredenciales'){
                $this->verificarCredenciales($_REQUEST);
            }
            if($_REQUEST['option']=='buscarTallerPorNombre'){
                $this->buscarTallerPorNombre($_REQUEST);
            }
            if($_REQUEST['option']=='buscarTallerPorNombreContacto'){
                $this->buscarTallerPorNombreContacto($_REQUEST);
            }
            if($_REQUEST['option']=='buscarTallerPorNombreTaller'){
                $this->buscarTallerPorNombreTaller($_REQUEST);
            }
            if($_REQUEST['option']=='buscarSectorNegocio'){
                $this->buscarSectorNegocio($_REQUEST);
            }

        // }    


    
    }
    public  function mainView()
    {
        $this->view->mainView();
    }
    public function showClients()
    {
        $clients = $this->model->getClients();
        // $clients = $this->model->conexion3();
        $this->view->showClients($clients);
    }
    public function buscarTallerPorNombre($request)
    {
        $clients = $this->model->getClientsFilterNombre($request['nombre']);
        // $clients = $this->model->conexion3();
        $this->view->showClients($clients);
    }
    public function buscarTallerPorNombreContacto($request)
    {
        $clients = $this->model->getClientsFilterNombreContacto($request['nombre']);
        // $clients = $this->model->conexion3();
        $this->view->showClients($clients);
    }
    public function buscarTallerPorNombreTaller($request)
    {
        $clients = $this->model->getClientsFilterNombreTaller($request['nombre']);
        // $clients = $this->model->conexion3();
        $this->view->showClients($clients);
    }
    public function buscarSectorNegocio($request)
    {
        $clients = $this->model->getClientsFilterSectorNegocio($request['idSector']);
        // $clients = $this->model->conexion3();
        $this->view->showClients($clients);
    }
    public function showClientsFilter($request)
    {
        $clients = $this->model->getClientsFilterCity($request['ciudad']);
        // $clients = $this->model->conexion3();
        $this->view->showClients($clients);
    }
    public function askNew()
    {
        $this->view->askNew();
    }

    public function saveClient($request){
        $this->model->saveClient($request);
    }

    public function newFollow($request){
        $idTaller = $request['idTaller'];
        $client =  $this->model->getClientId($idTaller);
        $this->view->newFollow($client);
    }
    
    public function saveFollow($request)
    {
        $this->model->saveFollow($request);
    }
    public function showFollows($request)
    {
        $follows = $this->model->showFollows($request['idTaller']);
        $client =  $this->model->getClientId($request['idTaller']);
        $this->view->showAllFollowTaller($follows,$request['idTaller'],$client);
    }
    public function showInfoClient($request)
    {
        $client =  $this->model->getClientId($request['idTaller']);
        $this->view->askNew($client);
    }
    
    public function actualizarTaller($request)
    {
        $this->model->actualizarTaller($request);
    }
    public function pantallaLogueo()
    {
        ?>
            <div id="div_logueo_inicial">
                <P>Digite Usuario y contraseña</P>
                <input  type="text"  id="user">
                <input  type="password"  id="password">
                <button onclick="verificarCredenciales();">Enviar</button>
                <p>Acceso restringido a personal no autorizado </p>

            </div>
            <script src = '../js/talleres.js'></script>

        <?php
    }

    public function verificarCredenciales($request)
    {
         $valida = $this->modelUsuario->verificarCredenciales($request);
         if($valida['filas'] > 0)
         {
            //credenciales validas
            $this->mainView();
         }   
         else{
            echo 'Credenciales Invalidas';
            $this->pantallaLogueo();
         }
    }


    
    
}

?>