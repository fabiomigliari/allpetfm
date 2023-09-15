<?php 

require_once "./conexao_bd.php";
require_once "./pessoaRepositorio.php";
require_once "./Classes/Pessoa.php";
require_once "./Classes/Endereco.php";
require_once "./Classes/Tutor.php";

$pessoarepositorio = new pessoaRepositorio($pdo);
$pessoarepositorio->deletarTutor($_POST['idTutor']);

header("Location: contutor.php");