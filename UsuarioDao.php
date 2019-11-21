<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion
{
	protected static $cnx;

	private static function getConexion()
	{
		self::$cnx = Conexion::conectar();
	}

	private static function desconectar()
	{
		self::$cnx = null;
	}

	public static function login($usuario)
	{
		$query = "SELECT * FROM usuarios WHERE usuario = :usuario AND contraseña = :contraseña";

		self::getConexion();

		$resultado = self::$cnx->prepare($query);

		$resultado->bindParam(":usuario", $usuario->getUsuario());
		$resultado->bindParam(":contraseña", $usuario->getContraseña());

		$resultado->execute();

		if($resultado->rowCount() > 0){
			$filas = $resultado->fetch();
			if($filas["usuario"]==$usuario->getUsuario()
				&& $filas["contraseña"]== $usuario->getContraseña()){
				return true;
			}
		}

		return false;
	}

		public static function getUsuario($usuario)
	{
		$query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios WHERE usuario = :usuario AND contraseña = :contraseña";

		self::getConexion();

		$resultado = self::$cnx->prepare($query);

		$resultado->bindParam(":usuario",$usuario->getUsuario());
		$resultado->bindParam(":contraseña",$usuario->getContraseña());

		$resultado->execute();

		$filas = $resultado->fetch();

		$usuario = new Usuario();
		$usuario->setId($filas["id"]);
		$usuario->setNombre($filas["nombre"]);
		$usuario->setUsuario($filas["usuario"]);
		$usuario->setEmail($filas["email"]);
		$usuario->setPrivilegio($filas["privilegio"]);
		$usuario->setFecha_registro($filas["fecha_registro"]);

		return $usuario;

	}

	public static function registrar($usuario)
	{
		$query = "INSERT INTO usuarios (nombre,email,usuario,contraseña,privilegio) VALUES (:nombre,:email,:usuario,:contraseña,:privilegio)";

		self::getConexion();

		$resultado = self::$cnx->prepare($query);

		$resultado->bindParam(":nombre", $usuario->getNombre());
		$resultado->bindParam(":email", $usuario->getEmail());
		$resultado->bindParam(":usuario", $usuario->getUsuario());
		$resultado->bindParam(":contraseña", $usuario->getContraseña());
		$resultado->bindParam(":privilegio", $usuario->getPrivilegio());

		if($resultado->execute()){
			return true;
		}

		return false;
		
	}
}