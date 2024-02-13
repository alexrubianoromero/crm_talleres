<?php
namespace models;
use conexion\Conexion;

class SectorNegocioModel extends Conexion
{
    public function getSectors()
    {
        $conexion =$this->connectMysql();
        $sql = "select * from sectorNegocio"; 
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $sectores = $this->get_table_assoc($consulta); 
        return $sectores;
    }
}