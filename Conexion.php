<?php

class Conexion{

	/**
	*Conexion a la base de datos
	*
	* @return PDO
	*/
	public static function conectar(){
		try{

			$cn = new PDO("mysql:host=localhost;dbname=registro","admin","1234");

			return $cn;

		} catch (PDOException $ex){
			die($ex->getMessage());
		}

	}
}
