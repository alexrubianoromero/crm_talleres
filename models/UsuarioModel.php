<?php
namespace models;
use conexion\Conexion;

class UsuarioModel extends Conexion
{
   
    public function verificarCredenciales($request)
    {
        $sql = "select * from usuarios where login =  '".$request['user']."'  and password = '".$request['password']."'   "; 
        $conexion =$this->connectMysql();
        $consulta = mysql_query($sql,$conexion);
        $filas = mysql_num_rows($consulta);
        $respu['filas']= $filas;
    }

}