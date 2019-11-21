<?php

include '../controlador/UsuarioControlador.php';
include '../Ayudas/ayuda.php';

session_start();

header('Content-type: application/json');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtContraseña"])){

		$txtNombre = validar_campo($_POST["txtNombre"]);
		$txtEmail = validar_campo($_POST["txtEmail"]);
		$txtUsuario = validar_campo($_POST["txtUsuario"]);
		$txtContraseña = validar_campo($_POST["txtContraseña"]);
		$txtPrivilegio = 2;


		if(UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtContraseña, $txtPrivilegio)){
			$usuario = UsuarioControlador::getUsuario($txtUsuario, $txtContraseña);
			$_SESSION["usuario"] = array(
				"id"=>$usuario->getId(),
				"nombre"=>$usuario->getNombre(),
				"usuario"=>$usuario->getUsuario(),
				"email"=>$usuario->getEmail(),
				"privilegio"=>$usuario->getPrivilegio(),
			);
			//header("location:admin.php");
		}
	}

}else{
	header("location:registro.php?error=1");
}