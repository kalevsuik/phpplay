<?php

function db_connect() {

    static $connection;

    if(!isset($connection)) {
        $config = parse_ini_file('config.ini');
        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
    }

    if($connection === false) {
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query) {
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

    return $result;
}


function db_select($query) {
    $rows = array();
    $result = db_query($query);
    if($result === false) {
        return false;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        /*print $row['id'] . " ";
        print $row['first_name'] . " ";
        print $row['username'] . "<BR>";*/
        $rows[] = $row;
    }
    return $rows;
}


function db_quote($row) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$row) . "'";
}

function db_get_users(){
    $rows = db_select("SELECT `id`,`username`,`email`,`first_name` as firstname,`last_name` as lastname,`password`,`admin` FROM `ksaadi_users`");
    if($rows === false) {
        $error = db_error();
        // as devel, just display
        echo $error;
        die();
    }else{
        $users = array();

        //print_r( $rows);

        foreach ($rows as $row) {
          //  print "<BR>";
           // print_r ($row);
            $users += [ $row['username']  => $row ];
        }
        return $users;
    }
}

function db_add_user($username,$password,$firstname,$lastname,$email){

    //$str="INSERT INTO `ksaadi_users` (`username`,`password`,`last_name`,`first_name`,`email`) VALUES (" . $username . "," . $password . "," . $lastname . "," . $firstname . "," . $email . ")";

    //echo $str;

    $result = db_query("INSERT INTO `ksaadi_users` (`username`,`password`,`last_name`,`first_name`,`email`) VALUES (" . $username . "," . $password . "," . $lastname . "," . $firstname . "," . $email . ")");
    if($result === false) {
        return false;
    }/*else{
        echo $result;
    }*/
    return true;
}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

function db_add_feedback($user_id,$location,$feedback){
    $str="INSERT INTO `ksaadi_feedback` (`userid`,`location`,`feedback`) VALUES (" . $user_id . "," . $location . "," . $feedback .  ")";
    echo $str;
    
    $result = db_query("INSERT INTO `ksaadi_feedback` (`userid`,`location`,`feedback`) VALUES (" . $user_id . "," . $location . "," . $feedback .  ")");
    if($result === false) {
        return false;
    }else{
        echo $result;
    }
    return true;
}

?>