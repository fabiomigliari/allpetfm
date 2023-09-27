<?php
// routes/web.php

// Define a simple GET route
$app->get('/test', function ($request, $response, $args) {
    $response->getBody()->write('Hello, World!');
    return $response;
});

$app->post('/tutorSend', 'TutorController:createTutor');
$app->get('/tutor', 'TutorController:getAllTutor');
$app->any('/{url:.+}', function ($request, $response, $args) {
    $response->getBody()->write('Route nott found.');
    return $response;
});
