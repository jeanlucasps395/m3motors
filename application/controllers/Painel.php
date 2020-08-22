<?php
include_once APPPATH.'/third_party/pag/PagSeguroAssinaturas.php';
use CWG\PagSeguro\PagSeguroAssinaturas;
    class Painel extends CI_Controller{
        function __construct() {

            parent::__construct();
            // $this->load->model('login');
            $this->load->model('inicio');
            $this->load->model('painel_mod');
            $this->load->library('session');


        }


         function index(){
           $this->load->view('painel/login');
        }
        function login(){
            $dados = $this->input->post();

            $dados = array(
                'usuario' =>  $this->input->post('usuario'),
                'senha' =>  sha1($this->input->post('senha')),
            );
            $user = $this->painel_mod->buscarUsuario($dados);

            if(empty($user)){
                header('Location: '.base_url().'painel/index?erro=true');
            }else{
                $dados_sessao = array (
                    'id_admin' => $user['id_admin'],
                    'usuario' => $user['usuario']
                );
                $this->session->set_userdata($dados_sessao);
                header('Location: '.base_url().'painel/dashboard');
            }
        }
        function dashboard(){
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/dashboard');
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }

        function adicionarCarro(){
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/addcar');
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }

        function cadastrarCarro(){

            $last_id = $this->painel_mod->last_id();

            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'style/carros/'.($last_id['id']+1);        
            $totalFotos = $this->input->post('contFotos');

            if(!file_exists( $_SERVER['DOCUMENT_ROOT']."".base_url().'style/carros/')){
                mkdir($_SERVER['DOCUMENT_ROOT']."".base_url().'style/carros/', 0777, true);
            }    

            
            if (!file_exists($endereco)) {
                mkdir($endereco, 0777, true);
                for($cont = 1; $cont <= $totalFotos; $cont++){
                    $name_foto = 'arquivo'.$cont;
                    move_uploaded_file($_FILES[$name_foto]['tmp_name'], $endereco."/carro".$cont.".png");
                }
            }


            $dados = array(
                'nome' => $this->input->post('nome'),
                'marca' => $this->input->post('marca'),
                'descricao' => $this->input->post('message'),
                'ano' => $this->input->post('ano'),
                'valor' => $this->input->post('valor'),
                'km' => $this->input->post('km'),
                'imagem' => base_url('style/carros/').($last_id['id']+1),
                'dataCadastro' => date('Y-m-d'),
                'carroAtivo' => 1
            );
            
            $this->painel_mod->cadastrarCarros($dados);    

            echo "<script>alert('Cadastro feito com sucesso');location='".base_url('painel/dashboard')."';</script>";
            
           
        }

        function editarCarro(){
            if(!empty($this->session->userdata('id_admin'))){
                $dados['lista'] = $this->painel_mod->buscarVeiculos();
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/editcar',$dados);
            }else{
                header('Location: '.base_url().'painel/index?erro=true');
            }
        }

        function editarVeiculo(){
            $id = $this->input->get('id');
            $dados['veiculo'] = $this->painel_mod->buscarVeiculos_edit($id);
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/editcar_form',$dados);
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }
        
        function removerImagem(){
            unlink($_SERVER['DOCUMENT_ROOT'].$this->input->get('caminho'));
            header('Location: '.base_url().'painel/editarVeiculo?id='.$this->input->get('id'));
        }


        function editarCarroForm(){

            $id = $this->input->post('id'); 

            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'style/carros/'.$id;  


            $dir = $endereco;
            $files = scandir($dir,1);
            $cont_files = 0;
            $name_ultima_final = 0;

            foreach ($files as $file){
             $caminho_completo = $endereco.'/'.$file;
             if ($file != '.' && $file != '..'){

                $name_ultima = $file;
                $name_ultima = explode("o",$name_ultima);
                $name_ultima = explode(".",$name_ultima[1]);

                if($name_ultima_final < $name_ultima[0]){
                    $name_ultima_final = $name_ultima[0];
                }

                $cont_files ++;

             }  
            }


            $totalFotos = $this->input->post('contFotos');

            if (!file_exists($endereco)) {
                mkdir($endereco, 0777, true);
            }
            $cont_foto_indice = 1;
            for($cont = $cont_files + 1; $cont < ($cont_files + 1 + $totalFotos) ; $cont++ ){
                $name_foto = 'arquivo'.$cont_foto_indice;
                if(isset(($_FILES[$name_foto]['tmp_name']))){
                    move_uploaded_file($_FILES[$name_foto]['tmp_name'], $endereco."/carro".($cont_foto_indice + $name_ultima_final).".png");
                }
                $cont_foto_indice ++;
            }


            $dados = array(
                'nome' => $this->input->post('nome'),
                'marca' => $this->input->post('marca'),
                'descricao' => $this->input->post('message'),
                'ano' => $this->input->post('ano'),
                'valor' => $this->input->post('valor'),
                'km' => $this->input->post('km')
            );
            
            $this->painel_mod->ediarVeiculo($dados,$id);    

            echo "<script>alert('Edição feita com sucesso');location='".base_url('painel/editarCarro')."';</script>";
        }

        function apagarCarro(){
            if(!empty($this->session->userdata('id_admin'))){
                $dados['lista'] = $this->painel_mod->buscarVeiculos();
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/apagar_carro',$dados);
            }else{
                header('Location: '.base_url().'painel/index?erro=true');
            }
        }
         function apagarVeiculo(){
            $id = $this->input->get('id');
            $this->painel_mod->apagarVeiculo($id);   
            echo "<script>alert('Veiculo apagado com sucesso');location='".base_url('painel/apagarCarro')."';</script>";   
         }


        //  Noticias
         function adicionarNoticias(){
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/adicionarNoticias',);
            }else{
                header('Location: '.base_url().'painel/index?erro=true');
            }
         }

         function adicionarNoticiaCadastro(){
            $last_id = $this->painel_mod->last_id_noticias();

            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'style/noticias/'.($last_id['id_noticia']+1);        

            if(!file_exists( $_SERVER['DOCUMENT_ROOT']."".base_url().'style/noticias/')){
                mkdir($_SERVER['DOCUMENT_ROOT']."".base_url().'style/noticias/', 0777, true);
            }    

            
            if (!file_exists($endereco)) {
                mkdir($endereco, 0777, true);

                $name_foto = 'arquivo';
                move_uploaded_file($_FILES[$name_foto]['tmp_name'], $endereco."/noticia.png");
            }


            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'conteudo' => $this->input->post('message'),
                'imagem' => base_url('style/noticias/').($last_id['id_noticia']+1),
                'dataCadastro' => date('Y-m-d'),
                'noticiaAtiva' => 1
            );
            
            $this->painel_mod->cadastrarNoticia($dados);    

            echo "<script>alert('Cadastro feito com sucesso');location='".base_url('painel/dashboard')."';</script>";
         }


         function apagarNoticiaList(){
             if(!empty($this->session->userdata('id_admin'))){
                $dados['lista'] = $this->painel_mod->buscarNoticias();
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/apagarNoticia',$dados);
            }else{
                header('Location: '.base_url().'painel/index?erro=true');
            }
         }
         function apagarNoticia(){
            $id = $this->input->get('id');
            $this->painel_mod->apagarNoticia($id);   
            echo "<script>alert('Notícia apagada com sucesso');location='".base_url('painel/apagarNoticiaList')."';</script>";   
         }

         function editarNoticiaList(){
            if(!empty($this->session->userdata('id_admin'))){
                $dados['lista'] = $this->painel_mod->buscarNoticias();
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/editarNoticia',$dados);
            }else{
                header('Location: '.base_url().'painel/index?erro=true');
            }
         }

         function editarNoticiaForm(){
            $id = $this->input->get('id');
            $dados['noticia'] = $this->painel_mod->buscarNoticia_edit($id);
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/header_painel');
                $this->load->view('painel/editNoticia_form',$dados);
            }else{
                header('Location: '.base_url().'painel/index');
            }
         }
      
         function removerImagemNoticia(){
            unlink($_SERVER['DOCUMENT_ROOT'].$this->input->get('caminho'));
            header('Location: '.base_url().'painel/editarNoticiaForm?id='.$this->input->get('id'));
         }

         function editarNoticia(){
            $id = $this->input->post('id'); 

            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'style/noticias/'.$id;  

            if (!file_exists($endereco)) {
                mkdir($endereco, 0777, true);
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'conteudo' => $this->input->post('message')
            );

            if(isset($_FILES['arquivo']['tmp_name'])){
                $name_foto = 'arquivo';
                move_uploaded_file($_FILES[$name_foto]['tmp_name'], $endereco."/noticia.png");
            }
            

            $this->painel_mod->ediarNoticia($dados,$id);    

            echo "<script>alert('Edição feita com sucesso');location='".base_url('painel/editarNoticiaList')."';</script>";
         }
      

    }
?>