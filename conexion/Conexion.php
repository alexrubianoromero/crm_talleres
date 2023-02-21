<?php
namespace conexion;
use \PDO;
class Conexion{
    // private $host = "localhost";
    // private $user = "root";
    // private $password = "peluche2016";
    // private $db = "base_crm";
    // private $conect;
    
        private $host = "localhost";
        private $user = "ctwtvsxj_admin";
        private $password = "ElMejorProgramador***";
        private $db = "ctwtvsxj_base_crm";
        private $conect;

    public function __construct(){
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try {
            $this->conect = new PDO($connectionString,$this->user,$this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            $this->conect ='Error de conexión';
            echo "ERROR: ". $e->getMessage();
        }

        // $this->connectMysql();
    }

    public function connect()
    {
        return $this->conect;
    }
    public function connectMysql(){
            $conexionMysql =mysql_connect($this->host,$this->user,$this->password);
            $la_base =mysql_select_db($this->db,$conexionMysql);
            return $conexionMysql;
    }




}

?>