<?php

// include_once APPPATH.'/third_party/pag/PagSeguroAssinaturas.php';
// use CWG\PagSeguro\PagSeguroAssinaturas;

    class Home extends CI_Controller{

        function __construct() {

            parent::__construct();
            
            $this->load->model('inicio');
            // $this->load->model('pagseguro_control');
            $this->load->library('session');



        }


        function index(){


            // $this->load->view('estrutura/header', $title);
            // $dados['noticias'] = '';

            $dados['carros'] = $this->inicio->buscarCarrosHome();
            $dados['noticias'] = $this->inicio->buscarNoticiasHome();
            // print_r($dados['carros']);

            $this->load->view('estrutura/header');
            $this->load->view('home',$dados);
            $this->load->view('estrutura/footer');
        }

        function veiculos(){
            $dados['carros'] = $this->inicio->buscarCarros();
            $this->load->view('estrutura/header');
            $this->load->view('veiculos',$dados);
            $this->load->view('estrutura/footer');
        }

        function product(){
            $id = $this->input->get('id');
            if(empty($id)){
                header('Location: '.base_url().'home/veiculos');
            }
            $dados['carros'] = $this->inicio->buscarCarro($id);
            $this->load->view('estrutura/header');
            $this->load->view('product',$dados);
            $this->load->view('estrutura/footer');
        }

        function news(){
            $dados['news'] = $this->inicio->buscarNews();
            $this->load->view('estrutura/header');
            $this->load->view('news',$dados);
            $this->load->view('estrutura/footer');
        }

        function newspaper(){
            $id = $this->input->get('id');
            if(empty($id)){
                header('Location: '.base_url().'home/news');
            }
            $dados['new'] = $this->inicio->buscarNew($id);
            $this->load->view('estrutura/header');
            $this->load->view('newspaper',$dados);
            $this->load->view('estrutura/footer');
        }


         function emailrodape(){
            $nomelCliente = $this->input->post('nomelCliente');
            $emailCliente = $this->input->post('emailCliente');
            $mensagem = $this->input->post('mensagem');
            $telefone = $this->input->post('telefone');

            $mesagem = 'Nome: '.$nomelCliente.'<br>'.'Email: '.$emailCliente.'<br>'.'Mensagem: '.$mensagem.'<br>'.'Telefone: '.$telefone.'<br>';

            $this->email->from('m3motors@m3motors.com', 'm3motors');
            $this->email->to('jean.lucas395@gmail.com');
            $this->email->subject('m3motors | contato');
            $this->email->message($mesagem);

            // Enviar...
            $this->email->send();

            echo "<script>alert('Mensagem enviada com sucesso');location='".base_url('home/index')."';</script>";
        }


    }
