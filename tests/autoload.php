<?php
include('./controllers/Functions.php');
    function autoload($class)
    {

        // Define an array of base directories for your classes
    $baseDirs = [
        __DIR__ . '/controllers/',
        __DIR__ . '/Classes/',
        __DIR__ . '//',
        // Add more paths as needed
    ];

    // Iterate through the base directories and try to load the class
    foreach ($baseDirs as $baseDir) {
        $filePath = $baseDir . str_replace('\\', '/', $class) . '.php';
        
        if (file_exists($filePath)) {
            include($filePath);
            return; // Class found and loaded, exit the loop
        }
    }
}
        
    

    spl_autoload_register('autoload');

    $database = new DB();

    $db = $database->getConnection();
    
    $functions = new Functions();
?>