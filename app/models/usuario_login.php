<?php
    class UsuarioLogin extends ActiveRecord{
    		
    	public static function registrar($email, $password){
    		$usuario = new UsuarioLogin();
			
			$usuario -> facebook_id = 0;
			$usuario -> email = $email;
			$usuario -> password = sha1($password);
			$usuario -> ip_ingreso = $_SERVER['REMOTE_ADDR'];
			$usuario -> fecha_ingreso = date("Y-m-d H:i:s");
			$usuario -> numero_ingresos = 0;
			$usuario -> estado = "PENDIENTE";
			$usuario -> fecha_registro = date("Y-m-d H:i:s");
			$usuario -> fecha_modificacion = date("Y-m-d H:i:s");
    	}
		
		public static function registrarFacebook($facebook_id){
			
		}
    }
?>