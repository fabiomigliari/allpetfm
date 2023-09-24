<?php
require_once('../autoload.php');
require_once('../UseCases/CreateTutor.php');

// require_once('../config/DB.php');

class TutorController {
    private DB $db;
    private CreateTutor $createTutor;
    
    public function __construct() {
        $this->db = new DB();
        $this->createTutor = new CreateTutor(new TutorRepository($this->db->getConnection()), new PeopleRepository($this->db->getConnection()));
    }

    public function createTutor($request) {
        // Validate and process the request data
        $response = [];
        $data = json_decode($request, true);
        // Call the use case to create a new user
        if($data)
        {
        $tutor = $this->createTutor->execute($data);
        
        $response = array(
                "message" => "Data received successfully"
            );
        return $response;
        
        }
        else{
            return $response = array(['message' => 'Invalid user data'], 400);
        }
        // Return a response
        
    }

    // public function getUser(Request $request, Response $response, $userId): Response {
    //     // Call the use case to get a user by ID
    //     $user = $this->getTutor->execute($userId);

    //     // Return a response
    //     if ($user) {
    //         return $response->withJson($user, 200);
    //     } else {
    //         return $response->withJson(["message" => "User not found"], 404);
    //     }
    // }
}
