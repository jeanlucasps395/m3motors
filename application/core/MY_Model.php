<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MY_Model extends CI_Model {

		private $code = null;
		private $message = null;
		private $query = null;
		private $funcao = null;

		function __construct() {
		    parent::__construct();
		    //$this->db->query("SET time_zone = 'America/Sao_Paulo';");
		}

		############################### TRANSACTION ###############################
		public function start(){
			$this->db->trans_begin();
		}

		//Se não houverem erros de SQL envia o commit
		public function commit(){
			if ($this->db->trans_status() === FALSE) {
			    $this->db->trans_rollback();

			    $erro = array(
			    				'fk_usuario' => $this->session->userdata('usuario'),
								'cod' => $this->code,
								'erro' => $this->message,
								'query' => $this->query,
								'funcao' => $this->funcao,
								'maquina_usuario_erro' => $_SERVER['HTTP_USER_AGENT']
			    			);

			    //Gerando arquivo de erro.
			    log_message('error',
			    			'Codigo: '.$this->code.' Mensagem: "'.$this->message.'" Query: "'.$this->query.'"');

			    //Armazenando no banco o log.
			    $this->db->insert('seg_log_erro',$erro);

			    return array('status' => false,
			    			 'log_erro' => $this->db->insert_id(),
			    			 'code' => $this->code,
			    			 'message' => $this->message,
			    			 'query' => $this->query);

			} else {
			    $this->db->trans_commit();
			    return array('status' => true);
			}
		}

		//Caso o erro seja detectado de outra forma,
		public function rollback(){
			$this->db->trans_rollback();
		}
		############################### Querys ###############################
		public function gerarHistorico($id,$tabela,$valores,$id_usuario = null){

			$comparar = $this->db->get_where($tabela,array($id => $valores[$id]))->row_array();

			foreach ($valores as $key => $valor) {
				if ($valor != $comparar[$key]) {
					$log = array (
								'fk_usuario'=> isset($id_usuario) ? $id_usuario : $this->session->userdata('usuario'),
								'original_edicao'=> $comparar[$key],
								'fk_aplicacao'=> $this->session->userdata('id_aplicacao_atual'),
								'novo_edicao'=> "{$valor}",
								'campo_edicao'=> "{$key}",
								'tabela_edicao'=> $tabela,
								'id_edicao'=> $valores[$id],
							);

					$this->db->insert('seg_log_edicao',$log);
				}
			}

		}

		public function verificarErros($erro,$funcao){

			if ($erro['code'] != 0) {
				$this->code = $erro['code'];
				$this->message = $erro['message'];
				$this->query = $this->db->last_query();
				$this->funcao = $funcao;
				return false;
			} else {
				return true;
			}

		}


	}
