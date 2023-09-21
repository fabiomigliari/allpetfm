<?php 

require_once "./conexao_bd.php";
require_once "./pessoaRepositorio.php";
require_once "./Classes/Pessoa.php";
require_once "./Classes/Tutor.php";
require_once "./Classes/Pet.php";

$pessoarepositorio = new pessoaRepositorio($pdo);
$pessoarepositorio->deletarPet($_POST['idPet']);

header("Location: conpet.php");
?>