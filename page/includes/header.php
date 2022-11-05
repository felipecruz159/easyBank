<header id="header" class="navbar navbar-expand-lg fixed-top">
  <a class="navbar-brand" href="./?page=home"><img src="./image/logo-extended.png" alt="easybank-logo" class="img-fluid mw-25"></a>
  <button class="navbar-toggler navbar-dark me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <nav class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link <?php if ($page == "home" || !isset($page)) echo "active";?>" aria-current="page" href="./?page=home">Início</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($page == "contas") echo "active";?>" href="./?page=contas">Contas</a>
      </li>
    </ul>
  </nav>
</header>

<div class="espaco" style="height: 70px;"></div>



