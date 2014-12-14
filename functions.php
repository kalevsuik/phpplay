<?php

function db_connect() {

        // Define connection as a static variable, to avoid connecting more than once
    static $connection;

        // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('config.ini');
        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
    }

        // If connection was not successful, handle the error
    if($connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query) {
        // Connect to the database
    $connection = db_connect();

        // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}


function db_select($query) {
    $rows = array();
    $result = db_query($query);

        // If query failed, return `false`
    if($result === false) {
        return false;
    }

        // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

function db_get_users(){
    $rows = db_select("SELECT `id`,`username`,`email`,`first_name`,`last_name`,`password`,`admin` FROM `ksaadi_users`");
    if($rows === false) {
        $error = db_error();
        // Handle error - inform administrator, log to file, show error page, etc.
        // as devel, just display
        echo $error;
        die();
    }
    $users = array();

        // look through query
    while($row = $rows) {
        //while($row = mysql_fetch_assoc($user_query)){

        $usr = array(
            'password' => $row["password"],
            'firstname' => $row["first_name"],
            'lastname' => $row["last_name"],
            'id' => $row["id"],
            'username' => $row["username"],
            'email' => $row["email"],
            'admin' => $row["admin"],
            );
        
        $users += [ $usr->$row["username"]  => $usr ];

    }

    return $users;
}

?>