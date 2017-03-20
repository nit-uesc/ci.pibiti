<?php
class Email_model extends CI_Model{
	//email de confirmação de cadastro
	public function cadastro_email($dados){
		$dados['mensagem']="
							<p>Prezado ".$dados['doc_nome'].",</p><br>
							<p>Seu cadastro no PIBITI/UESC 2017 foi realizado com sucesso!</p>
							<p>Agradecemos a sua participação, em breve entraremos em contato para avisar
							sobre a submisão de seu projeto.</p>
							<br><br>
							<p>Atenciosamente,</p>
							<p>Equipe NIT-UESC</p>	
						";
		$dados['assunto']="Cadastro PIBITI/UESC 2017";
		$dados['email']=$dados['doc_email'];
		return  $this->sistema_email($dados);
	}
	//email de recuperação de senha
	public function remember_email($dados){
		$dados['mensagem']='
							<p>Prezado,</p><br>
							<p>Sua senha foi alterada com sucesso!</p>
							<br />
							<p>Usuário: '.$dados[0]->usu_login.'</p>
							<p>Senha: '.$dados['nova_senha'].'</p>
							<br><br>
							<p>Atenciosamente,</p>
							<p>Equipe NIT-UESC</p>	
						';
		$dados['assunto']="Alteração de senha PIBITI/UESC 2016";
		$dados['email']=$dados[0]->doc_email;
		return  $this->sistema_email($dados);
	}
	//função de envio de email pelo sistema	
	public function sistema_email($dados){
		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'pibiti2016@gmail.com';
        $config['smtp_pass'] = 'Pibiti2016Caci';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        //$config['validation'] = TRUE; // bool whether to validate email or not      
        $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
        $config['priority'] = 1;
        $config['wordwrap'] = TRUE;
		
		$this->load->library('email');
		$this->email->initialize($config);		
		$this->email->from('pibiti2016@gmail.com', 'PIBITI 2016');
		$this->email->to($dados['email']); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 
		$this->email->subject($dados['assunto']);
		$this->email->message($dados['mensagem']);

		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}
}
?>
	
