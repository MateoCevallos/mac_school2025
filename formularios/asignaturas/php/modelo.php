<?php
//include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");

class clase_asignaturas
{   
    private $db;
    public $vl_id;
    public $vl_nombre;
    public $vl_observacion;

    public function __construct()
    {
        $this->vl_id = "";
        $this->vl_nombre = "";
        $this->vl_observacion = "";
        $this->db = (new Conexion())->getConexion();
    }

    
    // LISTAR / BUSCAR 
    public function _consultartodo($valor)
    {
        if ($valor == '') {
            $sql = "SELECT * FROM mac_asig";
            $stmt = $this->db->prepare($sql);
        } else {
            $sql = "SELECT * FROM mac_asig 
                    WHERE ASIG_NOMBRE LIKE :valor
                    OR ASIG_OBSERV LIKE :valor";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':valor', "%".$valor."%", PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt;
    }


    // CONSULTAR POR CÓDIGO
    public function _consultarcodigo($valor)
    {
        /*$sql = "SELECT * FROM mac_asig WHERE ASIG_CODIGO = :codigo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;*/


        $sql = "SELECT * FROM mac_asig WHERE ASIG_CODIGO = :valor";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':valor', $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;   // ← devolvemos el statement*/
    }

    // INSERTAR
    public function _insertar($vl_nombre, $vl_observacion)
    {
        // Si por cualquier cosa viene null, lo convertimos a cadena vacía
        if ($vl_observacion === null) {
            $vl_observacion = '';
        }

        // Opcional: quitar espacios al inicio y final
        $vl_nombre      = trim($vl_nombre);
        $vl_observacion = trim($vl_observacion);

        $sql = "INSERT INTO mac_asig (ASIG_NOMBRE, ASIG_OBSERV)
                VALUES (:nombre, :observ)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $vl_nombre, PDO::PARAM_STR);
        $stmt->bindValue(':observ', $vl_observacion, PDO::PARAM_STR);
        $stmt->execute();
        return $this->db->lastInsertId();
    }


    // ELIMINAR
    public function _eliminar($valor)
    {
        $sql = "DELETE FROM mac_asig WHERE ASIG_CODIGO = :valor";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':valor', $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // ACTUALIZAR
    public function _actualizar($nombre, $observ, $id)
    {
        $sql = "UPDATE mac_asig
                SET ASIG_NOMBRE = :nombre,
                    ASIG_OBSERV = :observ
                WHERE ASIG_CODIGO = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':observ', $observ, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
