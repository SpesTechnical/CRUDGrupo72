<?php
date_default_timezone_set("America/Costa_Rica");


class LABORATORIOG7
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "grupo7";
    private $conn;

    function __construct()
    {
        try {

            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    /*-----------------------------------------------GETS--------------------------------------------------*/

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

    
    function InsertarDato(string $nombreP, string $apellidosP, string $direccionP, string $telefonoP, string $edadP, string $alturaP)
    {
        $querySelect = "SELECT * FROM `agenda` WHERE `telefono`='$telefonoP'";
        $result = mysqli_query($this->conn, $querySelect);
        $search = mysqli_fetch_array($result);

        if (empty($search)) {
            $query = "INSERT INTO `agenda`(`nombre`, `apellidos`, `direccion`,`telefono`, `edad`, `altura`) VALUES('$nombreP', '$apellidosP', '$direccionP','$telefonoP', '$edadP','$alturaP')";
            $this->conn->query($query);
            echo json_encode(array('codigo' => 1));
        } else {
            if (!empty($search)) {
                echo json_encode(array('codigo' => 2));
            }
        }
    }

    function actulizaDato(string $nombrePE, string $apellidosPE, string $direccionPE, string $telefonoPE, string $edadPE, string $alturaPE, string $telefonoID)
    {
   

        $querySelect = "SELECT * FROM `agenda` WHERE `telefono`='$telefonoID'";
        $result = mysqli_query($this->conn, $querySelect);
        $search = mysqli_fetch_array($result);

        if (empty($search)) {
            $query = "UPDATE `agenda` SET `nombre`='$nombrePE',`apellidos`='$apellidosPE', `direccion`='$direccionPE', `telefono`='$telefonoPE', `edad`='$edadPE' , `altura`='$alturaPE' WHERE `telefono`='$telefonoID'";
            $this->conn->query($query);
            echo json_encode(array('codigo' => 1));
        }else{
            if (!empty($search)) {
                echo json_encode(array('codigo' => 2));
            }
        }
  
    }

    

}

$ObjLAB = new LABORATORIOG7();

//Elimina Dato
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'borraPERSONA') {
        $telefonoPERSONA = $_POST["telefonoPERSONA"];

        $ObjLAB->EliminaDato($telefonoPERSONA);
    }
}

//Inserta Dato
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'agregarPERSO') {
        $nombreP = $_POST["nombreP"];
        $apellidosP = $_POST["apellidosP"];
        $direccionP = $_POST["direccionP"];
        $telefonoP = $_POST["telefonoP"];
        $edadP = $_POST["edadP"];
        $alturaP = $_POST["alturaP"];


        $ObjLAB->InsertarDato($nombreP, $apellidosP, $direccionP,$telefonoP, $edadP, $alturaP);
    }
}

//Edita Telefonista
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'actualizaPERSONA') {
        $telefonoPE = $_POST['telefonoPE'];
        $telefonoID = $_POST['telefonoID'];
        $nombrePE = $_POST['nombrePE'];
        $apellidosPE = $_POST['apellidosPE'];
        $direccionPE = $_POST['direccionPE'];
        $edadPE = $_POST['edadPE'];
        $alturaPE = $_POST['alturaPE'];


        $ObjLAB->actulizaDato($telefonoID, $nombrePE, $apellidosPE, $direccionPE, $telefonoPE, $edadPE,$alturaPE);
    }
}

