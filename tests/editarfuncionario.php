<?php

use tests\Entity\Servico;

require __DIR__.'\..\vendor\autoload.php';

////VALIDAÇÃO DO ID
if(!isset($_GET['id'])){
    header('location: conservico.php?status=error');
    exit;
}
//CONSULTA O SERVICO
$obServico = Servico::getServicos($_GET['id']);
//var_dump($obServico);
//exit();

//VERIFICANDO OBJETO
if ($obServico !== null) {
    // Objeto de 'Servico' é válido
}else{}

//VALIDAÇÃO DO POST
if(isset($_POST['editar'])){
    $obServico-> nomeservico    =     $_POST['nomeservico'];
    $obServico-> duracao        =     $_POST['duracao'];
    $obServico-> preco          =     $_POST['preco'];
    $obServico-> fluxoag        =     $_POST['fluxoag'];
    $obServico-> periodorec     =     $_POST['periodorec'];
    $obServico-> modatend       =     $_POST['modatend'];
    $obServico->atualizar();

    header('location: conservico.php?status=success');
    exit;
}

//VALIDAÇÃO DE SERVICO
//if(!$obServico instanceof Servico){
//    header('location: conservico.php?status=error');
//    exit;
//}

?>