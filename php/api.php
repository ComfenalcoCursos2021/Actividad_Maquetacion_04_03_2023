<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');
    // basededatos: bd_formulario,  id20325416_bd_formulario
    // usuario: gestorFormulario,   id20325416_gestorformulario
    // contraseña: [[MC@%qsCWfbaQP8

    $_DATA = json_decode(file_get_contents("php://input"), true);

    $conexion = new PDO('mysql:host=localhost;dbname=id20325416_bd_formulario', "id20325416_gestorformulario", "[[MC@%qsCWfbaQP8");
    $query = $conexion->prepare("INSERT INTO `tb_informacion`(`nombre`, `correo`, `celular`, `mensaje`) VALUES (:NombreUsuario,:CorreoElectronico,:Celular,:Mensaje)");
    $query->execute($_DATA);

    echo json_encode([
        "Datos guardados" => $query->rowCount(), 
        "servidor"=> $_SERVER["HTTP_HOST"]
    ],JSON_PRETTY_PRINT);
?>