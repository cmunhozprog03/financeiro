<?php

require_once("../conexao.php");

$nome = $_POST['nome-usuario'];
$email = $_POST['email-usuario'];
$senha = $_POST['senha-usuario'];
$id = $_POST['id-usuario'];


$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = '$id'");
$query->bindValue(":nome", "$nome");  
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->execute();


echo 'Salvo com sucesso!';