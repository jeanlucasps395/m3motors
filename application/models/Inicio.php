<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Model {

	function buscarCarrosHome(){
		$dados = $this->db->query('select * from veiculos  order by id DESC limit 0,6')->result_array();
		return $dados;
	}

	function buscarNoticiasHome(){
		$dados = $this->db->query('select * from noticias  order by id_noticia DESC limit 0,2')->result_array();
		return $dados;
	}
  
}