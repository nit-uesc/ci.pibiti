<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fechamento {

	public function fecha_cadastro($end)
	{
		if(now() < $end)
			return true;
		else
			return false;
		endif;
	}
	
	public function fecha_envio_projeto($end)
	{
		if(now() < $end)
			return true;
		else
			return false;
		endif;
	}
	
	public function fecha_envio_plano($end)
	{
		if(now() < $end)
			return true;
		else
			return false;
		endif;
	}
}
?>