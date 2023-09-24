// routes/web.php

$routes = [];

// Define a route for listing users
$routes['GET']['/users'] = 'UserController@index';

// Define a route for creating a user
$routes['POST']['/users'] = 'UserController@create';

// Define a route for retrieving a user by ID
$routes['GET']['/users/{id:\d+}'] = 'UserController@show';

// Define a route for updating a user by ID
$routes['PUT']['/users/{id:\d+}'] = 'UserController@update';

// Define a route for deleting a user by ID
$routes['DELETE']['/users/{id:\d+}'] = 'UserController@destroy';

return $routes;
<?php
// routes/web.php

$routes = [];

// Define a route for listing users
// $routes['GET']['/users'] = 'UserController@index';

// Define a route for creating a user
$routes['POST']['/tutor'] = 'TutorController@createTutor';

// Define a route for retrieving a user by ID
// $routes['GET']['/users/{id:\d+}'] = 'UserController@show';

// Define a route for updating a user by ID
// $routes['PUT']['/users/{id:\d+}'] = 'UserController@update';

// Define a route for deleting a user by ID
// $routes['DELETE']['/users/{id:\d+}'] = 'UserController@destroy';

return $routes;
