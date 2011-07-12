<?php
	class Menu{
		private $menus = array();
		private $nm = 0;
		
		public function Menu(){
			
		}
		
		public function agregarMenu(){
			$menus[$nm] = new Opcion();
		}
		
		public function agregarSubMenu(){
			
		}
	}
	
	class Opcion{
		private $titulo;
		private $url;
	}
?>