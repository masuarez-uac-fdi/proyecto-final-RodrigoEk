<?php

include '../datos/UsuarioDao.php';

class UsuarioControlador{

	public static function login($usuario, $contraseña)
	{
		$obj_usuario = new Usuario();
		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setContraseña($contraseña);

		return UsuarioDao::login($obj_usuario);
	}

	public function getUsuario($usuario, $contraseña)
	{
		$obj_usuario = new Usuario();
		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setContraseña($contraseña);

		return UsuarioDao::getUsuario($obj_usuario);
	}

	public function registrar($nombre, $email, $usuario, $contraseña, $privilegio)
	{
		$obj_usuario = new Usuario();
		$obj_usuario->setNombre($nombre);
		$obj_usuario->setEmail($email);
		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setPrivilegio($privilegio);
		$obj_usuario->setContraseña($contraseña);

		return UsuarioDao::registrar($obj_usuario);
	}

}