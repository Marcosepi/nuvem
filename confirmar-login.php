<?php
session_start();
require_once 'configuracao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

//$select = mysql_select_db("$banco") or die("Sem acesso ao DB, Entre em contato com lucas.compufc@gmail.com");
$conexao -> query("use $banco") or die ("Erro ao selecionar o database");
$sql = "SELECT * FROM usuarios WHERE email_usuario = '$email' and senha = '$senha'";

$result = $conexao -> prepare($sql) or die("Erro ao selecionar o usuário");
$result->execute();

if ($result->rowCount() > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:index.php');
} else {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location:login.php');

}
?>

