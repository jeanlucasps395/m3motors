<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta name = "Description" content = "Colchoes" >    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, height=device-height">
    <meta name="theme-color" content="#2E3192">
    <title>Wf colchões</title>
    <meta name="robots" content="index,follow">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link href="<?= base_url('style/css/header.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('style/css/footer.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('style/css/theme-animate.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('style/css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('style/js/jquery.js'); ?>"></script>
    <script src="<?= base_url('style/js/bootstrap/bootstrap.min.js'); ?>"></script>



    <link rel="stylesheet" href="<?= base_url('style/css/')?>style.css">
    <script src="<?= base_url('style/js/')?>script.js"></script>

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('style/scss/')?>slick.scss" />
    <script type="text/javascript" src="<?= base_url('style/js/')?>slick.min.js"></script>
    <script src=" <?= base_url('style/js/')?>plugins_framework_efeitos.js"></script>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"/>
    

    <link rel="stylesheet" type="text/css" href="https://kit-pro.fontawesome.com/releases/v5.10.1/css/pro.min.css">

    <style>
        body{
            font-family: 'roboto' !important;
        }
        textarea:focus, input:focus, select:focus {
            /*box-shadow: 0px 0px 2px #041239;*/
            /*border: 0px solid #041239;*/
            outline: 0px;
        }
    </style>


    <!-- Menu mobile -->
    <script type="text/javascript">
        function openMenuXS(){
            $('.mobilemenu-block').css('display','block');
        }    
        function closeMenuXS(){
            $('.mobilemenu-block').css('display','none');
        }  
    </script>


    <!-- Ancora -->
    <script>
        $(document).ready(function(){
            $(function() {
                $('.atAnc').on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
                    closeMenuXS();
                });
            });
        });
    </script>



    <!-- Busca -->
    <script type="text/javascript">

      // Abrir menu
      function  openOpcoes(){
        $('.busca-block__options').css('display','block');
      }
       function  closeOpcoes(){
        $('.busca-block__options').css('display','none');
      }
    </script>


</head>
<body>


<!-- mobile menu -->
<div class="mobileMenu">
    <div class="mobilemenu-block">
        <p class="mobilemenu-block__times"><i class="far fa-times" onclick="closeMenuXS()"></i></p>
        <img  src="<?= base_url('style/'); ?>img/logo.png" class="header-block__logo block__logo--mobile">
        <p>
          <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/index'); ?>">Artigos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/meusPedidosPesquisa'); ?>">Contatos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/produtos'); ?>">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link atAnc" href="#Contatos"> Precisa de ajuda?</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/produtos'); ?>">Veículos</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511998887212"> <i class="fab fa-whatsapp"></i> Contato via Whatsapp </a>
            <a class="nav-link" href="tel:5511998887212"><i class="fad fa-phone"></i> Ligar pra Wf Colchões</a>
          </li> -->
        </ul>
        </p>
    </div>
</div>

<div class="background-home">
    
   <nav class="navbar navbar-expand-md navbar-dark header-block ">
          
      <div class="col-xl-5 col-lg-4 col-md-4 col-sm-6 col-6">
          <a class="navbar-brand"  href="<?= base_url('home/index'); ?>">
            <img src="<?= base_url('style/'); ?>img/logo.png" alt="M3 Motors" class="header-block__logo">
          </a>
      </div>

      <div  class="col-xl-7 col-lg-8 col-md-8 col-sm-6 col-6 p0">
          
          <div class="d-none d-sm-block">
              <button class="navbar-toggler header-block_toogle" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
          </div>

          <button type="button" onclick="openMenuXS()" class="botaoXSmenu d-block d-sm-none">
              <i class="fad fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/index'); ?>"><p class="item-navlink"> Artigos</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/produtos'); ?>"><p class="item-navlink">  Contatos</p></a>
              </li>
              <li class="nav-item">
                <a class="nav-link atAnc" href="#Contatos"><p class="item-navlink">  Precisa de ajuda?</p></a>
              </li><!-- 
              <li class="nav-item">
                <a class="nav-link" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511998887212"><i class="fab fa-whatsapp"></i></a>
              </li> -->
              <li class="mm-last-item nav-item">
                <a class="nav-link" href="<?= base_url('home/produtos'); ?>">Veículos</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</div>
