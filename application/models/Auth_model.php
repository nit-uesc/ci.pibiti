<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	
	public function auth($login, $senha)
	{
		if($usuario = $this->exist($login)):
			
			if($usuario->ntry < 3):
				if($usuario->usu_senha == $senha):
					$data['check']= $usuario;
					$this->unlock($usuario->usu_login);
				else:
          $this->inc_ntry($login,$usuario->ntry);
					$restantes = 2-$usuario->ntry;
					$restantes = "Senha inválida, {$restantes} tentativas restantes.";
					$data['return'] = $this->return_boxes->error($restantes);
				endif;
			else:
				$data['return'] = $this->return_boxes->error('Número de tentativas excedidas.');
				$data['recaptcha'] = true;
			endif;
		else:
			$data['return'] = $this->return_boxes->error('Usuário inválido.');
		endif;
		
		return $data;
	}
	
	public function auth_recaptcha($login, $senha)
	{
		if($usuario = $this->exist($login)):
			if($usuario->usu_senha == $senha):
				$data['check']= $usuario;
			else:
				$data['return'] = "Senha inválida<br>";
				$data['recaptcha'] = true;
			endif;
		else:
			$data['return'] = 'Usuário inválido';
		endif;
		return $data;
	}
	
	public function exist($login)
	{
		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usu_login' , $login);
		$rs = $this->db->get();
		
		if($rs->num_rows() > 0):
			foreach($rs->result() as $usuario):
				return $usuario;
				break;
			endforeach;
		else:
			return false;
		endif;
	}
	public function exist_email($email)
	{
		
		$this->db->select('*');
		$this->db->from('docente');
		$this->db->join('usuario', 'usuario.usu_id=docente.fk_usu_id');
		$this->db->where('doc_email' , $email);
		$rs = $this->db->get();
		
		if($rs->num_rows() > 0):
			return $rs->result();
		else:
			return false;
		endif;
	}
	public function inc_ntry($login,$ntry)
	{
		$ntry = $ntry+1;
		$data = array(
               'ntry' =>  $ntry
            );

		$this->db->where('usu_login' , $login);
		$rs = $this->db->update('usuario', $data);
		
		if($rs):
			return true;
		else:
			return false;
		endif;
	
	}
	public function unlock($login)
	{
		
		$data = array(
               'ntry' =>  '0'
            );
		$this->db->where('usu_login' , $login);
		$rs = $this->db->update('usuario', $data);
		
		if($rs):
			return true;
		else:
			return false;
		endif;
	}
	public function remember($user)
	{
			#$a = $user[0];
			#echo var_dump($a);
			
			//gerando nova senha
			$nova_senha = $this->generatePassword();
			//inserindo nova senha no banco
			$data = array(
               'usu_senha' =>  sha1($nova_senha)
            );
			#echo "(auth)nova senha:".$nova_senha."<br>";
			#echo "(auth)nova senha:".$user[0]->fk_usu_id."<br>";
			
			$this->db->where('usu_id' , $user[0]->fk_usu_id);
			$rs = $this->db->update('usuario', $data);
			
			if($rs):
				return $nova_senha;
			else:
				return false;
			endif;
	}
	private function generatePassword($length=6) {
		return substr(str_shuffle("aeiouyAEIOUYbdghjmnpqrstvzBDGHJLMNPQRSTVWXZ0123456789()@!&"), 0, $length);
	}

}
