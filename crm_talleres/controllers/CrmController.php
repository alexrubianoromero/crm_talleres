<?php

namespace controllers;
use views\CrmView;
use models\ClientsModel;
class CrmController
{
    protected $view;
    protected $model;

    public function __construct()
    {   
        $this->view = new CrmView();
        $this->model = new ClientsModel();

        if(!isset($_REQUEST['option'])){
            $this->mainView();
        }
        if($_REQUEST['option']=='showClients'){
            $this->showClients();
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
        $this->view->showAllFollowTaller($follows);
    }
    public function showInfoClient($request)
    {
        $client =  $this->model->getClientId($request['idTaller']);
        $this->view->showInfoClient($follows);
    }

}

?>