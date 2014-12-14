<?php

function connect_db(){

//andmebaasiga ühendumise funktsioon
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("Andmebaasiga ei saa ühendust- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function login(){
	// siia tahan teha sisselogimise funktsiooni
	
	// kontrollib, kas kasutaja on sisse logitud, kui on siis suunab hääletamise vaatesse
    if (!empty($_SESSION['login']) && $_SESSION['login'] === true) {
        header('Location: index.php?page=vote');
        die();
    }

    $errors = array();

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        connect_db();
        $connection=$GLOBALS['connection'];
        $user_query = mysqli_query($connection, "select * from ksaadi_users where username = '" . mysqli_real_escape_string($connection, $_POST['username']) . "' and password = '" . $_POST['password'] . "' limit 1");
        $user = mysqli_fetch_assoc($user_query);
        mysqli_free_result($user_query);
        mysqli_close($connection);
        if (!empty($user)) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php?page=vote');
            die();
        } else {
            $errors[] = 'Kasutajanimi või salasõna ei ole korrektsed!';
        }
    } else {
        $errors[] = 'Palun sisesta nii kasutajanimi kui salasõna!';
    }
    include 'views/login.php';

}

function registration(){
	// siia tahan teha registreerimise funktsiooni
	
	// kontrollib, kas kasutaja on sisse logitud, ja suunab hääletamise vaatesse
    if (!empty($_SESSION['login']) && $_SESSION['login'] === true) {
        header('Location: index.php?page=vote');
        die();
    }

    $errors = array();
// kas on ok, kõik viis välja siia ritta laduda
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $connection = connect_db();
        $user_query = mysqli_query($connection, "select * from ksaadi_users where username = '" . mysqli_real_escape_string($connection, $_POST['username']) . "' and password = '" . sha1($_POST['password']) . "' limit 1");
        $user = mysqli_fetch_assoc($user_query);
        mysqli_free_result($user_query);
        mysqli_close($connection);
        if (!empty($user)) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['username'] = $user['username'];
        header('Location: index.php?page=vote');  //kas peaks hääletuse lehele juhatama või kusagile mujale?
        die();
    } else {
        $errors[] = 'Väljad ei ole korrektselt täidetud!';
    }
} else {
    $errors[] = 'Palun täida kõik väljad!';
}

include 'views/register.php';
}

function validate_registration() {

// tahan teha funktsiooni millega valideerida registreerimisvormi kõiki välju

    $postfields = array(
        'first_name' => 'Palun sisesta eesnimi!',
        'last_name' => 'Palun sisesta perekonnanimi!',
        'email' => 'Palun sisesta e-mail!',
        'username' => 'Palun sisesta kasutajanimi!',
        'password' => 'Salasõna on kohustuslik!',
        
        );

    $errormsgs = array();

    foreach ($postfields as $postfield => $errormsg) {
        if (empty($_POST[$postfield])) {
            $errormsgs[] = $errormsg;
        }
    }

    if (!empty($errormsgs)) {
        return $errormsgs;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errormsgs[] = 'E-mail ei ole korrektne!';
    }

    if (strlen($_POST['password']) < 6) {
        $errormsgs[] = 'Salasõna peab sisaldama vähemalt 6 tähemärki!';
    }


    if (!empty($errormsgs)) {
        return $errormsgs;
    }

    $connection = connect_db();
    $email_query = mysqli_query($connection, "select * from ksaadi_users where email = '" . mysqli_real_escape_string($connection, $_POST['email']) . "' limit 1");
    $user = mysqli_fetch_assoc($email_query);
    mysqli_free_result($email_query);
    mysqli_close($connection);

    if (!empty($user)) {
        $errormsgs[] = 'Sellise e-mailiga kasutaja on juba olemas, proovi hoopis sisse logida!';
        return $errormsgs;
    }

    $connection = connect_db();
    $register_query = mysqli_query($connection, "insert into ksaadi_users (first_name, last_name, email, username, password) values ('" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['first_name'])) . "', '" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['last_name'])) . "','" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['username'])) . "','" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['email'])) . "', '" . sha1($_POST['password']) . "')");
    $user_id = mysqli_insert_id($connection);
    mysqli_free_result($register_query);
    mysqli_close($connection);

    if ($register_query === true) {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $user_id;
        $_SESSION['admin'] = 0;
        $_SESSION['username'] = htmlspecialchars($_POST['username']);
        header('Location: index.php?page=gallery');
        die();
    }

}

?>