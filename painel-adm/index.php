<?php
@session_start();
require_once("../conexao.php");
require_once("verificar.php");
//echo $_SESSION['nome_usuario'];

$id_usuario = $_SESSION['id_usuario'];

// RECUPERAR DADOS DO USUÁRIO
$query = $pdo->query("SELECT * FROM usuarios where id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $res[0]['nome'];
$email_usuario = $res[0]['email'];
$senha_usuario = $res[0]['senha'];
$nivel_usuario = $res[0]['nivel'];

include("header.php");

?>
<body>

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
                <?php echo $nome_usuario ?>
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
    <form action="autenticar.php" method="POST" id="form-perfil">


      <div class="w3-container">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nome</label>
          <input type="text" class="form-control inputTextUpper" name="nome-usuario" value="<?php echo $nome_usuario ?>">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" class="form-control inputTextLower" name="email-usuario" value="<?php echo $email_usuario ?>">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Senha</label>
          <input type="text" class="form-control" name="senha-usuario" value="<?php echo $senha_usuario ?>">
        </div>

        <input type="hidden" class="form-control" name="id-usuario" value="<?php echo $id_usuario ?>">

        <footer class="row justify-content-between">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close" id="btn-fechar-perfil">Fechar</button>
          <button type="submit" class="btn btn-dark mb-3">Salvar</button>
        </footer>
      </div>

      <small><div id="mensagem-perfil" align="center"></div></small>
    </form>
  </div>
</div>


<?php
include("footer.php");

?>

<!-- AJAX PARA INSERIR OU EDITAR DADOS -->
<SCRipt type="text/javascript">
  $('#form-perfil').submit(function(){
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "editar-perfil.php",
      type: 'POST',
      data: formData,

      success: function (mensagem) {
        $('#mensagem-perfil').removeClass()
        if (mensagem.trim() == "Salvo com sucesso!") {
          //$(#nome).val('');
          //$(#cpf).val('');
          $('#btn-fechar-perfil').click();
          window.location = "index.php";

        } else {
          $('#mensagem-perfil').addClass('text-danger')
        }

        $('#mensagem-perfil').text(mensagem)
      },
      cache: false,
      contentType: false,
      processData:false
    });

  })
</SCRipt>


</body>
</html>