<?php
	Load::lib("html");

	class Menu{
		public $secciones;	
		private $ns;
		private $nli;
		
		private $ajax;
		private $contenedor;
		private $cerrar;
		
		private $link_logo;
		private $logo;
		private $alt_logo;
			
		public function Menu($ajax = ""){
			$this -> secciones = array();
			if($ajax){
				$this -> contenedor = $ajax;
				$this -> ajax = true;	
			}
			else{
				$this -> ajax = false;
			}
			
			$this -> ns = -1;
			$this -> nli = -1;
		}
		
		public function cerrar($accion=""){
			if($accion){
				$this -> cerrar = $accion;
			}
			else{
				return $this -> cerrar;
			}
		}
		
		public function logotipo($accion="", $imagen="", $alt="", $width=180){
			if($accion){
				$this -> link_logo = $accion;
				$this -> logo = $imagen;
				$this -> alt_logo = $alt;
			}
			else{
				return Html::link($this -> link_logo,Html::imagen($this -> logo,$this -> alt_logo,$width,"id: logo"));
			}
		}
		
		public function seccion($texto, $url){
			$this -> ns ++;
			$this -> nli = -1;
			
			$this -> secciones[$this -> ns] = new Seccion($texto, $url, $this -> ajax); 
		}
		
		public function link($texto, $url){
			if($this -> ns == -1){
				$this -> seccion($texto, $url);
				return;
			}
			
			$this -> nli ++;
			
			$this -> secciones[$this -> ns] -> links[$this -> nli] = new Link($texto, $url, $this -> ajax);
		}
		
		public function html(){
			$html = '<ul id="main-nav">';
			if($this -> secciones) foreach($this -> secciones as $seccion){
				$html .= '<li>';
					$html .= Html::link($seccion -> url, $seccion -> texto,"class: nav-top-item");
					if($seccion -> links){
						$html .= '<ul>';
						foreach($seccion -> links as $link){
							if($this -> ajax){
								$html .= '<li>'.Html::linkAjax($link -> url, $link -> texto,$this -> contenedor).'</li>';	
							}
							else{
								$html .= '<li>'.Html::link($link -> url, $link -> texto).'</li>';
							}
						}
						$html .= '</ul>';
					}
				$html .= '</li>';
			}
			$html .= '</ul>';
			
			return $html;
		}
	}
	
	class Seccion{
		public $links;
		
		public $texto;
		public $url;
		public $ajax;
		
		public function Seccion($texto, $url, $ajax = false){
			$this -> texto = $texto;
			$this -> url = $url;
			$this -> ajax = $ajax;
		}
	}
	
	class Link{
		public $texto;
		public $url;
		
		public function Link($texto, $url, $ajax = false){
			$this -> texto = $texto;
			$this -> url = $url;
			$this -> ajax = $ajax;
		}
	}
?>