<?php
header('Content-Type: application/json');
// header("Content-Security-Policy: default-src 'none'; font-src <URL>");
ini_set('display_errors', 1);
ini_set('memory_limit', '128M');
error_reporting(E_ALL);


// include 'Classes/People.php';
// include 'Classes/Address.php'; // Include your People class file
require_once('autoload.php');






if (isset($_GET['setup']) && $_GET['setup'] == true) {
    // echo 'test';
    $endereco = new Address($db);
    // $endereco->setId('1');
    $people = new People($db, 'Garmaladdte', '2010-09-20', '42123713', '23234123', 'dskdad@gmail.com', '14422333', '1', $endereco);
    //   echo $endereco->createTableIfNotExists();
    //     echo $people->createTableIfNotExists();

    // echo $people->insertPerson($people);
    
    echo $people->getAllonDB();
    // echo $people->getById('4125683');

    
    // if (empty($peopleList)) {
    //     echo 'No people found.';
    // } else {
        
    //     foreach ($peopleList as $person) {
    //         echo  $json['cpf'] = $person['cpf'];
    //     }
        
    // }
    // foreach ($messages as $message) {
    //     echo $message.'<br>';
    //     # code...
    // }

    // if (isset($_GET['cpf'])) {
    //     $id = $_GET['cpf'];
    //     $person = $people->getById($id);
    //     if ($person) {
    //         // echo json_encode($person);
    //     } else {
    //         http_response_code(404);
    //         // echo json_encode(['error' => 'Person not found']);
    //     }
    // } else {
    //     $allPeople = $people->getAll();
    //     echo json_encode($allPeople);
    // }
 } else {
    $page = $functions->getPage();
 }
?>
