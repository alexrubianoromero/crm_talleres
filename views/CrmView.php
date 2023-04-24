<?php
namespace views;
use models\ClientsModel;

class CrmView{
    protected $model;
    public function __construct()
    {
        $this->model = new ClientsModel();
    }

    public function mainView()
    {
       ?>
       <!DOCTYPE html>
       <html lang="en">
       <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <title>Document</title>
       </head>
       <body>
        <div id="div_principal_crm" class ="container">
            <h2>AR SOLUTION TECHNOLOGY</h2>
            <div id="div_crm_botones" class ="row">
                <div class ="col-xs-12 col-md-3 ">
                    <button class="btn btn-primary" id="btn_vertalleres" onclick="verTalleres();">Ver_Talleres</button>
                </div>
                <div class ="col-xs-12 col-md-3">
                    <button class="btn btn-primary" id="btn_nuevovliente" onclick="preguntarNuevo();"  data-toggle="modal" data-target="#myModalClientes">Nuevo_Taller</button>
                </div>
                <div class ="col-xs-12 col-md-3">
                    <div class="form-group" align="right">
                        <select class="form-control"  id= "idCiudad"  onchange="showClientsFilter();" >
                            <?php
                                echo '<option value="" selected >Seleccione Ciudad</option>';        
        
                                $cities = $this->model->getCities(); 
                                foreach($cities as $city)
                                {
                                    echo '<option value="'.$city['ciudad'].'">'.$city['ciudad'].'</option>';        
                                }
                            ?>
                        </select>
                        
                    </div>  
                </div>
                <div class ="col-xs-12 col-md-3">
                    
                </div>

            </div>
            <br>
            <div id="div_crm_resultados">
               <?php  
                    $clients = $this->model->getClients(); 
                    $this->showClients($clients)
               ?>
            </div>
        </div>
        <?php $this->modalClientes(); ?>
        <?php $this->modalSeguimiento(); ?>
        <?php $this->modalInfoCliente(); ?>
       </body>
       </html>
       <script src="js/jquery-2.1.1.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/talleres.js"></script>
       <?php
    }

    public function modalClientes ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="verTalleres();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalSeguimiento()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalSeguimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                  </div>
                  <div id="cuerpoModalSeguimiento" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="verTalleres();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalInfoCliente()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalInfoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Informacion Taller</h4>
                  </div>
                  <div id="cuerpoModalInfoCliente" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="verTalleres();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }



    public function showClients($clients){
        echo '<table class="table table-striped">'; 
        echo '<thead>'; 
        echo '<tr>'; 
        echo '<th>Id</th>';
        echo '<th>Taller</th>';
        echo '<th>Telefono</th>';
        echo '<th>Ciudad</th>';
        // echo '<th>Direcion</th>';
        // echo '<th>Dueno</th>';
        // echo '<th>Contacto</th>';
        // echo '<th>Tipo_Taller</th>';
        echo '<th>Seguimiento</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>'; 
        while($client = mysql_fetch_assoc($clients)){
            echo '<tr>';
            echo '<td><button class="btn btn-primary" onclick="showInfoCLiente('.$client['id_taller'].')" data-toggle="modal" data-target="#myModalInfoCliente">'.$client['id_taller'].'</button></td>'; 
            echo '<td>'.$client['nombre'].'</td>'; 
            echo '<td>'.$client['telefono'].'</td>'; 
            echo '<td>'.$client['ciudad'].'</td>'; 
            // echo '<td>'.$client['direccion'].'</td>'; 
            // echo '<td>'.$client['dueno'].'</td>'; 
            // echo '<td>'.$client['contacto'].'</td>'; 
            // echo '<td>'.$client['tipo_taller'].'</td>'; 
            echo '<td>'; 
            // echo '<button class="btn btn-primary" onclick ="nuevoSeguimiento('.$client['id_taller'].');"   data-toggle="modal" data-target="#myModalSeguimiento" >Seguimiento</button>';
            echo '<button class="btn btn-primary" onclick ="pantallaSeguimientos('.$client['id_taller'].');"   data-toggle="modal" data-target="#myModalSeguimiento" >Ver</button>';
            echo '</td>'; 
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';    
    }   

    public function askNew($cliente= [])
    {
        ?>
        <div class = "form-group">
            <div>
                <span>Nombre Taller</span>
            </div>
            <div>
                <input  type = "hidden" id="idTaller" value = "<?php   echo  $cliente['id_taller'] ?>">
                <input class="form-control" type = "text" id="txtNombre" value = "<?php   echo  $cliente['nombre'] ?>">
            </div>
        </div>

        <div class = "form-group">
            <div>
                <span>Telefono</span>
            </div>
            <div>
                <input   class="form-control" type = "text" id="txtTelefono" value = "<?php   echo  $cliente['telefono'] ?>">
            </div>
        </div>

        <div class = "form-group">
            <div>
                <span>Direccion</span>
            </div>
            <div>
                <input  class="form-control" type = "text" id="txtDireccion" value = "<?php   echo  $cliente['direccion'] ?>">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Dueno</span>
            </div>
            <div>
                <input  class="form-control" type = "text" id="txtDueno" value = "<?php   echo  $cliente['dueno'] ?>">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Contacto</span>
            </div>
            <div>
                <input  class="form-control" type = "text" id="txtContacto" value = "<?php   echo  $cliente['contacto'] ?>">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Tipo Taller</span>
            </div>
            <div>
                <input  class="form-control"  type = "text" id="txtTipo" value = "<?php   echo  $cliente['tipo_taller'] ?>">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Ciudad</span>
            </div>
            <div>
                <input  class="form-control"  type = "text" id="txtCiudad" value = "<?php   echo  $cliente['ciudad'] ?>">
            </div>
        </div>
        <?php 
            if($cliente == [])
            {
                echo '<br>
                <button class = "btn btn-primary btn-lg btn-block" id="btn_guardar_taller" onclick="grabarInfoTaller();">Guardar Nuevo Taller</button>
                ';
            }
            else {
                echo '<br>
                <button class = "btn btn-primary btn-lg btn-block" id="btn_guardar_taller" onclick="actualizarInfoTaller();">Actualizar Taller</button>
                ';

            }
        ?>
        
        <?php
    }

    public function newFollow($client){
          ?>
            <div>
                <div></div>
                <div>
                    <label for="">Taller:</label>
                    <span><?php echo $client['nombre']?></span>
                </div>
                <div>
                    <label for="">Seguimiento</label>
                    <div class="form-group">
                        <textarea class ="form-control" id="txtSeguimiento" rows="10" cols="20"></textarea>
                    </div>
                </div>
                <br>
                <button class = "btn btn-primary btn-block btn-lg" id="btn_grabar_seguimiento" onclick="grabarSeguimiento(<?php echo $client['id_taller']  ?>);">Grabar Seguimiento</button>
            </div>
          <?php
    }


    public function showAllFollowTaller($follows,$idTaller,$client)
    {
        echo '<label>Nombre: </label>';
        echo '<span> '.$client['nombre'].'</span>'  ;   
        echo '<br>'   ;
        echo '<label>Telefono: </label>';
        echo '<span> '.$client['telefono'].'</span>';
        echo '<br>';
        echo '<table class ="table table-striped">'; 
        echo '<tr>';
        echo '<th>Fecha</th>';
        echo '<th>Seguimiento</th>';
        echo '</tr>';
        while($follow = mysql_fetch_assoc($follows))
        {
            echo '<tr>';
            echo '<td>'.$follow['fecha'].'</td>'; 
            echo '<td>'.$follow['observacion'].'</td>'; 
            echo '</tr>';
        }
        echo '</table>';
        echo '<br>';
        echo '<button class="btn btn-primary" onclick ="nuevoSeguimiento('.$idTaller.');"   >Nuevo Seguimiento</button>';
    }

}
?>