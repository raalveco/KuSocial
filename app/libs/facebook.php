<?php
	class FB{
		private $app_id = "129978650384209";
		private $app_secret = "951aff2bc472e254085b866e1ab0806d";
		private $redirect = "http://www.ameca.mx/fb/iniciarFacebook";
		
		public static function inicioFacebook($accion){
    		return Html::link($accion,Html::imagen("iniciar_facebook.jpg","Iniciar Sesion con Facebook"));
    	}
		
		public function iniciado(){
			if(isset($_REQUEST["code"])) $code = $_REQUEST["code"];
			
			if(empty($code)) {
		        return false;
		    }
		    
		    return true;
		}
		
		public function iniciar(){
			$this -> dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" 
		            . $this -> app_id . "&redirect_uri=" . urlencode($this -> redirect)."&scope=email,user_birthday";
		
		    echo("<script> top.location.href='" . $this -> dialog_url . "'</script>");
		        
			return false;
		}
		
		public function usuario(){
			if(!$this -> iniciado()) {
		        $this -> dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" 
		            . $this -> app_id . "&redirect_uri=" . urlencode($this -> redirect)."&scope=email,user_birthday";
		
		        echo("<script> top.location.href='" . $this -> dialog_url . "'</script>");
		        
		        return false;
		    }
			
			if(isset($_REQUEST["code"])) $code = $_REQUEST["code"];
			
			$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
		        . $this -> app_id . "&redirect_uri=" . urlencode($this -> redirect) . "&client_secret="
		        . $this -> app_secret . "&code=" . $code;
		
		    $access_token = file_get_contents($token_url);
		
		    $graph_url = "https://graph.facebook.com/me?" . $access_token;
		
		    $user = json_decode(file_get_contents($graph_url));
			
			return $user;
		}		
	}
    
?>