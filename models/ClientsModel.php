<?php
namespace models;
use conexion\Conexion;

class ClientsModel extends Conexion
{
   
    public function getClients()
    {
        $conexion =$this->connectMysql();
        $sql = "select * from talleres order by id_taller desc"; 
        $consulta = mysql_query($sql,$conexion);
        return $consulta;
    }

    public function saveClient($infoClient)
    {
        $conexion =$this->connectMysql();
        $sql = "insert into talleres (nombre,telefono,direccion,dueno,contacto,tipo_taller)   
        values ('".$infoClient['nombre']."','".$infoClient['telefono']."','".$infoClient['direccion']."'
        ,'".$infoClient['dueno']."','".$infoClient['contacto']."','".$infoClient['tipo']."'
        )"; 
        $consulta = mysql_query($sql,$conexion);
        echo 'Taller grabado'; 
    }
    
    public function getClientId($idTaller){
        $conexion =$this->connectMysql();
        $sql = "select * from talleres where id_taller = '".$idTaller."'  ";
        $consulta = mysql_query($sql,$conexion);
        $client = \mysql_fetch_assoc($consulta);
        return $client;  
    }
    
    public function saveFollow($client)
    {
        
        $conexion =$this->connectMysql();
        $sql = "insert into seguimientos (id_taller,observacion,fecha)   
        values ('".$client['idTaller']."'
        ,'".$client['seguimiento']."'
        ,now()
        )"; 
        
        // echo '<br>'.$sql;
        // die();
        $consulta = mysql_query($sql,$conexion); 
        
        echo 'Seguimiento grabado'; 
    }
    
    
    public function showFollows($idTaller)
    {
        $conexion =$this->connectMysql();
        $sql = "select * from seguimientos  where id_taller = '".$idTaller."' order by id_seguimiento desc  ";
        $consulta = mysql_query($sql,$conexion);
        return $consulta;  
    }
    
    
}
?>