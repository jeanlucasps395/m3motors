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

	function buscarCarros(){
		$dados = $this->db->query('select * from veiculos  order by id DESC')->result_array();
		return $dados;
	}
	function buscarCarro($id){
		$dados = $this->db->query('select * from veiculos  where id = '.$id.' ')->row_array();
		return $dados;
	}

	function buscarNews(){
            $this->db->order_by('id_noticia','DESC');
       return $this->db->get('noticias')->result_array();
    }

    function buscarNew($id){
		$dados = $this->db->query('select * from noticias  where id_noticia = '.$id.' ')->row_array();
		return $dados;
	}

	
  
}