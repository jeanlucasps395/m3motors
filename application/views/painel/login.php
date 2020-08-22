<meta name = "Description" content = "login" >    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, height=device-height">
<meta name="theme-color" content="#2E3192">
<title>M3MOTORS</title>
<meta name="robots" content="index,follow">

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<link href="<?= base_url('style/css/painel/login.css'); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://kit-pro.fontawesome.com/releases/v5.10.1/css/pro.min.css">


<video autoplay loop class="bg_video" muted>
	<source src="<?= base_url('style') ?>/img/background-painel.mp4" type="video/mp4">
	<source src="<?= base_url('style') ?>/img/background-painel.webm" type="video/webm">
</video>

<style type="text/css">
	.bg_video{
	position: fixed; 
	right: 0; 
	bottom: 0;
	min-width: 100%; 
	min-height: 100%;
	width: auto; 
	height: auto; 
	z-index: -1000;
	background-size: cover; 
}
</style>

<section class="login">
	<div class="login__bg">
		<div class="login_bloco">
			<h1 class="login_titulo">M3MOTORS</h1>
			<p class="login_subtitulo">Painel reestrito para administradores do site</p>
			<form action="<?= base_url('painel/login'); ?>" method="post">
				<div class="login_bloco-input">
					<i class="fad fa-user"></i>
					<input type="" name="usuario" class="login_input" placeholder="Usuário" required="">
				</div>
				<div class="login_bloco-input">
					<i class="fad fa-lock"></i>
					<input type="password" name="senha" class="login_input" placeholder="Senha" required="">
				</div>
				<?php if(isset($_GET['erro'])){ if($_GET['erro'] == true){ ?>
					<p class="login__error txR">Usuário ou senha inválidos</p>
				<?php } } ?>
				<div class="txR">
					<button type="submit" class="login_button">Entrar</button>
				</div>
			</form>
		</div>
	</div>
</section>
