<?php
@session_start();
require_once("../conexao.php");
require_once("verificar.php");
//echo $_SESSION['nome_usuario'];

include("header.php");

?>

<nav class="navbar navbar-expand-lg w3-dark-gray">
  <div class="container-fluid">
    <a class="navbar-brand w3-text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active w3-text-white" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  w3-text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled w3-text-white">Disabled</a>
        </li>
      </ul>
      <div class="d-flex mr-4">
        <img src="../img/user.png" class="img-profile rounded-circle" width="35px" height="35px" alt="">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle  w3-text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo @$_SESSION['nome_usuario'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Dados do Perfil</a></li>

                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header w3-dark-gray">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">
      <h3>Editar Perfil</h3>
    </h5>
    <button type="button" class="btn-close w3-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="autenticar.php" method="POST">


      <div class="w3-container">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nome</label>
          <input type="text" class="form-control" style="text-transform:uppercase;" name="nome">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Senha</label>
          <input type="text" class="form-control" name="senha">
        </div>


        <footer class="w3-container row">
          <button type="submit" class="btn btn-dark mb-3">Salvar</button>
        </footer>
      </div>

    </form>
  </div>
</div>


<?php
include("footer.php");

?>