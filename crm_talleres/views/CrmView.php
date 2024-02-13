<?php
namespace views;

use models\SectorNegocioModel;

class CrmView{

    protected  $sectorNegocioModel;

    public function __construct()
    {
        $this->sectorNegocioModel = new SectorNegocioModel();
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
        <div id="div_principal_crm">
            <h2>AR SOLUTION TECHNOLOGY</h2>
            <div id="div_crm_botones">
                <button class="btn btn-primary" id="btn_vertalleres" onclick="verTalleres();">Ver_Talleres</button>
                <button class="btn btn-primary" id="btn_nuevovliente" onclick="preguntarNuevo();"  data-toggle="modal" data-target="#myModalClientes">Nuevo_Taller</button>
            </div>
            <br>
            <div id="div_crm_resultados">
               
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
                      <h4 class="modal-title" id="myModalLabel">Seguimiento</h4>
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
        echo '<th>Direcion</th>';
        echo '<th>Dueno</th>';
        echo '<th>Contacto</th>';
        echo '<th>Tipo_Taller</th>';
        echo '<th>Seguimiento</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>'; 
        while($client = mysql_fetch_assoc($clients)){
            echo '<tr>';
            echo '<td><button class="btn btn-primary" onclick="showInfoCLiente('.$client['id_taller'].')" data-toggle="modal" data-target="#myModalSeguimiento">'.$client['id_taller'].'</button></td>'; 
            echo '<td>'.$client['nombre'].'</td>'; 
            echo '<td>'.$client['telefono'].'</td>'; 
            echo '<td>'.$client['direccion'].'</td>'; 
            echo '<td>'.$client['dueno'].'</td>'; 
            echo '<td>'.$client['contacto'].'</td>'; 
            echo '<td>'.$client['tipo_taller'].'</td>'; 
            echo '<td>'; 
            // echo '<button class="btn btn-primary" onclick ="nuevoSeguimiento('.$client['id_taller'].');"   data-toggle="modal" data-target="#myModalSeguimiento" >Seguimiento</button>';
            echo '<button class="btn btn-primary" onclick ="pantallaSeguimientos('.$client['id_taller'].');"   data-toggle="modal" data-target="#myModalSeguimiento" >Ver</button>';
            echo '</td>'; 
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';    
    }   

    public function askNew($idCLiente= [])
    {
        ?>
        <div class = "form-group">
            <div>
                <span>Nombre Taller</span>
            </div>
            <div>
                <input class="form-control" type = "text" id="txtNombre">
            </div>
        </div>

        <div class = "form-group">
            <div>
                <span>Telefono</span>
            </div>
            <div>
                <input   class="form-control" type = "text" id="txtTelefono">
            </div>
        </div>

        <div class = "form-group">
            <div>
                <span>Direccion</span>
            </div>
            <div>
                <input  class="form-control" type = "text" id="txtDireccion">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Dueno</span>
            </div>
            <div>
                <input  class="form-control" type = "text" id="txtDueno">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Contacto</span>
            </div>
            <div>
                <input  class="form-control" type = "text" id="txtContacto">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Tipo Taller</span>
            </div>
            <div>
                <input  class="form-control"  type = "text" id="txtTipo">
            </div>
        </div>
        <div class = "form-group">
            <div>
                <span>Linea de Negocio</span>
            </div>
            <div>
                <select id="sectorNegocio">
                <?php
                 $sectores = $this->sectorNegocioModel->getSectors();     
                 echo '<option value="-1">Seleccione...</option>';
                 foreach($sectores as $sector)
                 {
                     echo '<option value="'.$sector['id'].'">'.$sector['descripcion'].'</option>';

                 }

                ?>

                </select>
            </div>
        </div>
        <br>
        <button class = "btn btn-primary btn-lg btn-block"id="btn_guardar_taller" onclick="grabarInfoTaller();">Guardar Nuevo Taller</button>

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
                        <textarea id="txtSeguimiento" rows="10" cols = "60"></textarea>
                    </div>
                </div>
                <br>
                <button class = "btn btn-primary btn-block btn-lg" id="btn_grabar_seguimiento" onclick="grabarSeguimiento(<?php echo $client['id_taller']  ?>);">Grabar Seguimiento</button>
            </div>
          <?php
    }


    public function showAllFollowTaller($follows)
    {
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
            $idTaller = $follow['id_taller'];
        }
        echo '</table>';
        echo '<br>';
        echo '<button class="btn btn-primary" onclick ="nuevoSeguimiento('.$idTaller.');"   >Nuevo Seguimiento</button>';
    }

}
?>