<?php 

/** 
 *  Create A MYSQL Database
 */


$db = array(
    "host"      => "DB_HOST",       // database host. i.e. localhost
    "user"      => "DB_USER",       // database user  i.e. root
    "password"  => "DB_PASSWORD"    // database passord
);

$database = "DB_NAME";              // the name of the database to be created

try {
    $connection = new PDO('mysql:host='.$db['host'], $db['user'], $db['password'], 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
    $sql = "CREATE DATABASE " . $database;
    $connection->exec($sql);

    print_r( "Database created successfully." );
}
catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}


?>