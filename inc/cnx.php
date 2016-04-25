<?php
    define("HOST", "localhost");     // The host you want to connect to.
	define("USER", "cms");    // The database username. 
	define("PASSWORD", "Studentje1");    // The database password. 
	define("DATABASE", "projectcms");    // The database name.
 
	define("CAN_REGISTER", "any");
	define("DEFAULT_ROLE", "member");
 
	define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
		
    // create a connection to the database
    $link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    // if something went wrong, display error information
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
