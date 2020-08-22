<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class painel_mod extends CI_Model {

	public function categorias(){
        $dados = $this->db->get('categorias')->result_array();
		return  $dados;
	}
  
    public function last_id(){
         $this->db->select('id');
         $this->db->order_by('id','DESC');
         $dados = $this->db->get('veiculos')->row_array();

         if(empty($dados)){
         	$dados = array ( 'id' => 0 );
         }

        return  $dados;
        
    }
   

    function buscarUsuario($dados){
        return $this->db->get_where('admin',$dados)->row_array();
    }
    function cadastrarCarros($dados){
        $this->db->insert('veiculos', $dados);
    }


    function buscarVeiculos(){
              $this->db->order_by('id','DESC');
       return $this->db->get_where('veiculos',array('carroAtivo' => 1))->result_array();
    }

    function buscarVeiculos_edit($id){
        return $this->db->get_where('veiculos',array('id' => $id))->row_array();   
    }

    function ediarVeiculo($dados,$id){
        $this->db->where('id',$id);
        return $this->db->update('veiculos', $dados);
    }

    function apagarVeiculo($id){
        $this->db->delete('veiculos', array('id' => $id));
    }


    // noticias
    function last_id_noticias(){
        $this->db->select('id_noticia');
        $this->db->order_by('id_noticia','DESC');
         $dados = $this->db->get('noticias')->row_array();

         if(empty($dados)){
            $dados = array ( 'id' => 0 );
         }

        return  $dados;
    }
    function cadastrarNoticia($dados){
        $this->db->insert('noticias', $dados);
    }
    function buscarNoticias(){
            $this->db->order_by('id_noticia','DESC');
       return $this->db->get('noticias')->result_array();
    }

    function apagarNoticia($id){
        $this->db->delete('noticias', array('id_noticia' => $id));
    }
    function buscarNoticia_edit($id){
        return $this->db->get_where('noticias',array('id_noticia' => $id))->row_array();   
    }
    function ediarNoticia($dados,$id){
        $this->db->where('id_noticia',$id);
        return $this->db->update('noticias', $dados);
    }
}