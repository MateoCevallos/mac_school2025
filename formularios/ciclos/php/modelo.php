<?php
//include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_ciclos
{   private $db;
    public $vl_id;
    public $vl_nombre;
    public $vl_observacion;
    public function __construct()
    {
        $this->vl_id="";
        $this->vl_nombre="";
        $this->vl_observacion="";
        $this->db = (new Conexion())->getConexion();
    }
   
    public function _consultartodo($valor){
    if ($valor == '') {
        $dmlsentencia = "SELECT * FROM mac_cicl";
    } else {
        $dmlsentencia = "SELECT * FROM mac_cicl 
                         WHERE CIC_NOMBRE LIKE '%".$valor."%'
                            OR CIC_OBSERV LIKE '%".$valor."%'";
    }
    $registros = $this->db->query($dmlsentencia);
    return $registros;
    }
   
    public function _consultarcodigo($valor){
   
        $dmlsentencia="SELECT * FROM mac_cicl WHERE CIC_CODI = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _insertar($vl_nombre, $vl_observacion)
    {
        $dmlsentencia = "INSERT INTO mac_cicl (CIC_NOMBRE, CIC_OBSERV)
                        VALUES ('" . $vl_nombre . "', '" . $vl_observacion . "')";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
 
    public function _eliminar($valor)
    {
        $dmlsentencia = "DELETE FROM mac_cicl WHERE CIC_CODI = " . $valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
 
    public function _actualizar($nombre, $observ, $id)
    {
        $dmlsentencia = "UPDATE mac_cicl
                        SET CIC_NOMBRE = '" . $nombre . "',
                            CIC_OBSERV = '" . $observ . "'
                        WHERE CIC_CODI = " . $id;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
 
}
?>