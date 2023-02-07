<?php
date_default_timezone_set("America/Costa_Rica");

class LABORATORIOG7
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "grupo7";
    private $conn;

    // private $server = "localhost";
    // private $username = "root";
    // private $password = "";
    // private $db = "grupo7";
    // private $conn;

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

    function InsertarDato()
    {
        $datos = func_get_args();

        $querySelect = "SELECT * FROM `agenda` WHERE `telefono`='$datos[3]'";
        $result = mysqli_query($this->conn, $querySelect);
        $search = mysqli_fetch_array($result);

        if (empty($search)) {
            $query = "INSERT INTO `agenda`(`nombre`, `apellidos`, `direccion`,`telefono`, `edad`, `altura`) VALUES('$datos[0]', '$datos[1]', '$datos[2]','$datos[3]', '$datos[4]','$datos[5]')";
            $this->conn->query($query);

            echo json_encode(array('response' => true));
        } else {
            if (!empty($search)) {
                echo json_encode(array('response' => false));
            }
        }
    }

    function actulizaDato()
    {
        $datos = func_get_args();

        $query = "UPDATE `agenda` SET `nombre`='$datos[0]',`apellidos`='$datos[1]', `direccion`='$datos[2]', `edad`='$datos[4]' , `altura`='$datos[5]' WHERE `telefono`='$datos[3]'";

        if ($sql = $this->conn->query($query)) {
            echo json_encode(array('response' => true));
        } else {
            echo json_encode(array('response' => false));
        }
    }

    function EliminaDato()
    {
        $datos = func_get_args();

        $query = "DELETE FROM `agenda` WHERE `telefono` = '$datos[0]'";

        if ($sql = $this->conn->query($query)) {
            echo json_encode(array('response' => true));
        } else {
            echo json_encode(array('response' => false));
        }
    }
}

$ObjLAB = new LABORATORIOG7();

//Inserta Dato
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'agregar') {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $edad = $_POST["edad"];
        $altura = $_POST["altura"];

        $ObjLAB->InsertarDato($nombre, $apellidos, $direccion, $telefono, $edad, $altura);
    }
}

//Edita Dato
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'actualizar') {
        $telefono = $_POST['telefono'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $edad = $_POST['edad'];
        $altura = $_POST['altura'];

        $ObjLAB->actulizaDato($nombre, $apellidos, $direccion, $telefono, $edad, $altura);
    }
}

//Elimina Dato
if (isset($_POST["accion"])) {
    if ($_POST["accion"] == 'borrar') {
        $telefono = $_POST["telefono"];

        $ObjLAB->EliminaDato($telefono);
    }
}
