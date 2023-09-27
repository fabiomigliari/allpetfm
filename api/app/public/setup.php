<?php
// header('Content-Type: application/json');
// // header("Content-Security-Policy: default-src 'none'; font-src <URL>");
// ini_set('display_errors', 1);
// ini_set('memory_limit', '128M');
// error_reporting(E_ALL);


// // include 'Classes/People.php';
// // include 'Classes/Address.php'; // Include your People class file
// require_once('../autoload.php');
// require_once('../controllers/TutorController.php');




// $tutorController = new TutorController();

// if (isset($_GET['/setup']) && $_GET['/setup'] == true) {
//     // echo 'test';
//     // $endereco = new Address($db, '40', '19909-200', 'seilaaad', '60', 'ourinhos', 'SP ', 'SantosDum');
//     // $endereco->setId('1');
//     // $tutor = New Tutor($db,'59',true,'2010-09-25', 'Gmaaddte', '2010-09-20', '1745223', '11202013', 'dskdad@gmail.com', '14422333', '1', $endereco);
//    //  $people = new People($db, 'Garmaladdte', '2010-09-20', '42123713', '23234123', 'dskdad@gmail.com', '14422333', '1', $endereco);
//     //   echo $endereco->createTableIfNotExists();
//     //   echo $people->createTableIfNotExists();

//     // echo $people->insertPerson($people);
//     // echo $endereco->insertAddress($endereco);
//    //  echo $endereco->getAllonDB();
//     echo json_encode($tutorController->getAllTutor());
//    //  echo $tutor->insertTutor($tutor);
//     // echo $endereco->getById('4');

    
//     // if (empty($peopleList)) {
//     //     echo 'No people found.';
//     // } else {
        
//     //     foreach ($peopleList as $person) {
//     //         echo  $json['cpf'] = $person['cpf'];
//     //     }
        
//     // }
//     // foreach ($messages as $message) {
//     //     echo $message.'<br>';
//     //     # code...
//     // }

//     // if (isset($_GET['cpf'])) {
//     //     $id = $_GET['cpf'];
//     //     $person = $people->getById($id);
//     //     if ($person) {
//     //         // echo json_encode($person);
//     //     } else {
//     //         http_response_code(404);
//     //         // echo json_encode(['error' => 'Person not found']);
//     //     }
//     // } else {
//     //     $allPeople = $people->getAll();
//     //     echo json_encode($allPeople);
//     // }
//  }else if (isset($_GET['/cad']) && $_SERVER['REQUEST_METHOD'] === "POST") {
//      // Retrieve JSON data from the request body
//      $data = file_get_contents("php://input");
     
//     //  $response = new Response();
 
//      if ($data) {
        
//          // Process the data (e.g., save it to a database)
         
//          // Respond with a JSON message
         

//          echo json_encode($tutorController->createTutor($data));
//      } else {
//          http_response_code(400); // Bad Request
//          echo json_encode(array("message" => "Invalid JSON data"));
//      }
//  } else {
//      http_response_code(405); // Method Not Allowed
//      echo json_encode(array("message" => "Method not allowed"));
//  }
 
 
// // //  else {
// // //     $page = $functions->getPage();
// //  }
?>
