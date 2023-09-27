<?php
require '../vendor/autoload.php'; // Load the Composer autoloader
require_once('../controllers/TutorController.php');


use Slim\Factory\AppFactory;

// Create a Slim app
$app = AppFactory::create();


// Define routes
require __DIR__ . '../../routes/api.php';

// Run the application
$app->run();


