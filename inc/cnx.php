<?php
    $mysqlhost = 'localhost';
    $mysqldb = 'projectcms';
    $mysqluser = 'cms';
    $mysqlpass = 'Studentje1';

    // create a connection to the database
    $link = mysqli_connect($mysqlhost, $mysqluser, $mysqlpass, $mysqldb);

    // if something went wrong, display error information
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
