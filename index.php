<?php
  require_once("conexao.php");

  // Criar um super usuario no banco de dados
  $query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador'");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  $total_reg = @count($res);

  if($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_admin', email = '$email_admin', senha = '123', nivel = 'Administrador'");
  }
  
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- BOOTSTRAP 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- W3CSS -->
  <link rel="stylesheet" href="./css/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <title><?php echo $nome_sistema ?></title>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center mt-5 pt-5">
      <div class="col-sm-12 col-md-8 col-lg-5">
        <form action="autenticar.php" method="POST">
          <div class="w3-card-4">
            <header class="w3-container w3-center w3-dark-grey "><h2>Sistema Financeiro</h2></header>
          
            <div class="w3-container">

              <div class="form-floating mb-3 mt-5">
                <input type="email" class="form-control" id="floatingInput" name="email">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" name="senha">
                <label for="floatingInput">Senha</label>
              </div>

              <footer class="w3-container row">
                <button type="submit" class="btn btn-dark mb-3">Entrar</button>
              </footer>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </div>

<!-- BOOTSTRAP SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

  
</body>
</html