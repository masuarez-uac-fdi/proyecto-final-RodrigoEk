<?php

include '../controlador/UsuarioControlador.php';
include '../Ayudas/ayuda.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["txtUsuario"]) && isset($_POST["txtContraseña"])){

	$txtUsuario = validar_campo($_POST["txtUsuario"]);
	$txtContraseña = validar_campo($_POST["txtContraseña"]);

	$resultado = array("estado" => "true");

	if(UsuarioControlador::login($txtUsuario, $txtContraseña)){
		$usuario = UsuarioControlador::getUsuario($txtUsuario, $txtContraseña);
		$_SESSION["usuario"] = array(
			"id"=>$usuario->getId(),
			"nombre"=>$usuario->getNombre(),
			"usuario"=>$usuario->getUsuario(),
			"email"=>$usuario->getEmail(),
			"privilegio"=>$usuario->getPrivilegio(),
		);
		return print(json_encode($resultado));
	}
}

}

$resultado = array("estado" => "false");

return print(json_encode($resultado));