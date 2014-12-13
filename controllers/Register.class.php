<?php 

class register{
	public function run() {
		
		if(isset($_POST['username'])){
			$reqUsername = isset($_POST['username']) ? $_POST['username'] : ''; // kui username on olemas, siis votab selle, muul juhul jatab tyhjaks
			$reqPassword = isset($_POST['password']) ? $_POST['password'] : '';
			$reqFirstName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
			$reqLastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
			$reqEmail = isset($_POST['email']) ? $_POST['email'] : '';

			$host="localhost";
			$user="test";
			$pass="t3st3r123";
			$db="test";
			$connection = mysqli_connect($host, $user, $pass, $db) or die("Andmebaasiga ei saa ühendust- ".mysqli_error());
			mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

			//$register_query = mysqli_query($connection, "insert into ksaadi_users (first_name, last_name, email, username, password) values ('" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['first_name'])) . "', '" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['last_name'])) . "','" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['username'])) . "','" . mysqli_real_escape_string($connection, htmlspecialchars($_POST['email'])) . "', '" . sha1($_POST['password']) . "')");

			$sql = "INSERT INTO ksaadi_users (first_name, last_name, username,password,email) VALUES ('".$reqFirstName."', '".$reqLastName."', '".$reqUsername."', '".$reqPassword."', '".$reqEmail."')";

			if ($connection ->query($sql) === TRUE) {
    			echo "New user created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $connection->error;
			}

			//$user_query = $connection->query("select * from ksaadi_users ");

			$view = new View();
			$view->setTemplateFile('views/main.php');
			//echo "muuhhhahaa ". $reqUsername;
			echo $view->render();
			//exit();

		}else{
			$view = new View();
			$view->setTemplateFile('views/register.php');
			echo $view->render();

		}
	}
}

/*

$usr->setFirstName( $row["first_name"] );
			$usr->setLastName( $row["last_name"] );
			$usr->setUserName( $row["username"] );
			$usr->setEmail( $row["email"] );
			$usr->setPassword( $row["password"] );
			$usr->setAdmin( $row["admin"] );
		


*/