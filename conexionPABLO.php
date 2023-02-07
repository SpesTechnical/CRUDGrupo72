<?php
date_default_timezone_set("America/Costa_Rica");


class PABLOLABORATORIO
{
    private $server = "localhost:3306";
    private $username = "ROOT";
    private $password = "Pescado2023.";
    private $db = "tiusr6pl_grupo7";
    private $conn;

    function __construct()
    {
        try {

            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }


    function getConexion()
    {
        return $this->conn;
    }


    function muestraDatos()
    {
        $data = null;
        $query = "SELECT * FROM `agenda`";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function EliminaDato(string $telefono)
    {
        $query = "DELETE FROM `agenda` WHERE `telefono` = '$telefono'";
        if ($sql = $this->conn->query($query)) {
            echo json_encode(array('exito' => true));
        } else {
            echo json_encode(array('exito' => false));
        }
    }
    

}

$ObjLAB = new PABLOLABORATORIO();

//Elimina Dato
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'borraPERSONA') {
        $telefonoPERSONA = $_POST["telefonoPERSONA"];

        $ObjLAB->EliminaDato($telefonoPERSONA);
    }
}

//Inserta Chofer
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'agregarCH') {
        $nombreCH = $_POST["nombreCH"];
        $usuarioCH = $_POST["usuarioCH"];
        $cedulaCH = $_POST["cedulaCH"];
        $contrasenaCH = $_POST["contrasenaCH"];
        $contra = md5($contrasenaCH);
        $correoCH = $_POST["correoCH"];
        $placaCH = $_POST["placaCH"];
        $claveCH = $_POST["claveCH"];
        $asociadoCH = $_POST["asociadoCH"];
        $telefonoCH = $_POST["telefonoCH"];
        $bancoCH = $_POST["bancoCH"];
        $cuentaCH = $_POST["cuentaCH"];
        $nomAsociado = $_POST["nomAsociado"];
        $estado = 0;
        $datafono = 'D';

        $ObjSAD->insertarChofer($nombreCH, $cedulaCH, $usuarioCH, $contra, $telefonoCH, $correoCH, $placaCH, $claveCH, $asociadoCH, $datafono, $bancoCH, $cuentaCH, $nomAsociado, $estado);
        $ObjSAD->EnviarCorreoChofer($nombreCH, $usuarioCH, $contrasenaCH, $correoCH);
    }
}
