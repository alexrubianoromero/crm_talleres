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
    public function getClientsFilterCity($ciudad)
    {
        $conexion =$this->connectMysql();
        $sql = "select * from talleres where ciudad = '".$ciudad."' order by id_taller desc"; 
        // die($sql); 
        $consulta = mysql_query($sql,$conexion);
        return $consulta;
    }
    public function getClientsFilterNombre($nombre)
    {
        $conexion =$this->connectMysql();
        $sql = "select * from talleres where dueno like '%".$nombre."%' order by id_taller desc"; 
        // die($sql); 
        $consulta = mysql_query($sql,$conexion);
        return $consulta;
    }
    public function getClientsFilterNombreContacto($nombre)
    {
        $conexion =$this->connectMysql();
        $sql = "select * from talleres where contacto like '%".$nombre."%' order by id_taller desc"; 
        // die($sql); 
        $consulta = mysql_query($sql,$conexion);
        return $consulta;
    }
    public function getClientsFilterNombreTaller($nombre)
    {
        $conexion =$this->connectMysql();
        $sql = "select * from talleres where nombre like '%".$nombre."%' order by id_taller desc"; 
        // die($sql); 
        $consulta = mysql_query($sql,$conexion);
        return $consulta;
    }
    public function getClientsFilterSectorNegocio($idSector)
    {
        $conexion =$this->connectMysql();
        $sql = "select * from talleres where idSectorNegocio = '".$idSector."' order by id_taller desc"; 
        // die($sql); 
        $consulta = mysql_query($sql,$conexion);
        return $consulta;
    }
    
    public function saveClient($infoClient)
    {
        $conexion =$this->connectMysql();
        $sql = "insert into talleres (nombre,telefono,direccion,dueno,contacto,tipo_taller,ciudad,idSectorNegocio)   
        values ('".$infoClient['nombre']."','".$infoClient['telefono']."','".$infoClient['direccion']."'
        ,'".$infoClient['dueno']."','".$infoClient['contacto']."','".$infoClient['tipo']."','".$infoClient['ciudad']."'
        ,'".$infoClient['idSectorNegocio']."'
        )"; 
        // die($sql);
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
    public function getCities()
    {
        $sql = "select distinct(ciudad) from talleres order by ciudad  "; 
        $conexion =$this->connectMysql();
        $consulta = mysql_query($sql,$conexion);
        $arreglo = $this->get_table_assoc($consulta);
        return $arreglo;  
    }

    public function actualizarTaller($request)
    {
        $sql = "update talleres set 
        nombre =  '".$request['nombre']."'
        ,telefono =  '".$request['telefono']."'
        ,direccion =  '".$request['direccion']."'
        ,dueno =  '".$request['dueno']."'
        ,contacto =  '".$request['contacto']."'
        ,tipo_taller =  '".$request['tipo_taller']."'
        ,ciudad =  '".$request['ciudad']."'
        where id_taller = '".$request['idTaller']."'";
        // die($sql);
        $conexion =$this->connectMysql();
        $consulta = mysql_query($sql,$conexion);

        echo 'Taller actualizado';
        
    }
    
    
}
?>