<link href="<?= base_url('style/css/painel/dashboard.css'); ?>" rel="stylesheet">


<nav class="navbar navbar-expand-lg ">
  <div class="widhtPadrao">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fal fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="navbar-brand" href="<?= base_url('painel/dashboard'); ?>">M<span>3</span>motors</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('painel/dashboard'); ?>">Inicio </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('painel/editarCarro'); ?>">Carros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('painel/editarNoticiaList'); ?>">Notícias</a>
        </li>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="nav-link "><i class="fad fa-door-open"></i> Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>