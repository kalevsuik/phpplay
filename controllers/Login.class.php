
<?php 

//require_once '../functions.php';

class Login


{
	public function run()//peab koigis kontrollerites olema
	{
		$dbUsers = new Users();
		$users = $dbUsers->getAllUsers();
		/*
		$users = array(
			'kaire' => array(
				'password' => 'üübersiikrit',
				'firstname' => 'Kaire',
				'lastname' => 'Saadi',
				),
			);
		*/
		
		$reqUsername = isset($_POST['username']) ? $_POST['username'] : ''; // kui username on olemas, siis votab selle, muul juhul jatab tyhjaks
		$reqPassword = isset($_POST['password']) ? $_POST['password'] : '';

		$user = (array_key_exists($reqUsername, $users)) ? $users[$reqUsername] : array();
		//kontrollib kas users massiivis on vaartus olemas
		
		//if (!empty($user) && $reqPassword === $user['password'])//upper ja lower case kontroll
		if (!empty($user) && $reqPassword === $user->getPassword())
		{
			$_SESSION['logged_in'] = 1;
			//$_SESSION['fullname'] = $user['firstname'] . ' ' . $user['lastname'];
			$_SESSION['fullname'] = $user->getFirstName() . ' ' . $user->getLastName();
			session_write_close();//sessiooni lopetamiseks
			//header('Location:' . SITE_URL);// redirectimine
			exit();
		}
		
		$view = new View();
		if (!empty($_POST)) $view->addViewVar('loginerror', 'Vale kasutajanimi või salasõna.');	
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1)
		{
			$view->addViewVar('loginerror', 'Oled juba sisse logitud');
		}
		$view->addViewVar('username', $reqUsername);//jatab eeltaidetud info alles
		$view->setTemplateFile('views/login.php');
		echo $view->render();//
	}
}



class Users {
	function connect_db(){
		global $connection;
		$host="localhost";
		$user="test";
		$pass="t3st3r123";
		$db="test";
		$connection = mysqli_connect($host, $user, $pass, $db) or die("Andmebaasiga ei saa ühendust- ".mysqli_error());
		mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
		return $connection;
	}

	public function isValidUser($usr,$psd) {
		$connection=$this->connect_db();
		//$user_query = mysqli_query($connection, "select * from ksaadi_users ");
		$user_query = $connection->query("select id from ksaadi_users ");
		
	}

	public function getUserByUname($uName) {
		$users->getAllUsers();

	}

	public function getAllUsers() {
		$connection=$this->connect_db();
		//$user_query = mysqli_query($connection, "select * from ksaadi_users ");
		$user_query = $connection->query("select * from ksaadi_users ");
		//$user = mysqli_fetch_assoc($user_query);

		// set array
		$users = array();

		// look through query
		while($row = $user_query->fetch_assoc()) {
		//while($row = mysql_fetch_assoc($user_query)){
			$usr = new User();
			$usr->setId( $row["id"] );
			$usr->setFirstName( $row["first_name"] );
			$usr->setLastName( $row["last_name"] );
			$usr->setUserName( $row["username"] );
			$usr->setEmail( $row["email"] );
			$usr->setPassword( $row["password"] );
			$usr->setAdmin( $row["admin"] );
			$users += [ $usr->getUserName()  => $usr ];
		}

		return $users;
	}

	

}

class User {
	var $id;
	var $first_name;
	var $last_name;
	var $username;
	var $email;
	var $password;
	var $admin;

	function setId ($id){
		$this->id = $id;  
	}
	function getid (){
		return $this->id;  
	}
	function setFirstName ($firstName){
		$this->first_name = $firstName;  
	}
	function getFirstName (){
		return $this->first_name;  
	}
	function setLastName ($lName){
		$this->last_name = $lName;  
	}
	function getLastName (){
		return $this->last_name;  
	}
	function setUserName ($uName){
		$this->username = $uName;  
	}
	function getUserName (){
		return $this->username;  
	}
	function setEmail ($eMail){
		$this->email = $eMail;  
	}
	function getEmail (){
		return $this->email;  
	}
	function setPassword ($pswd){
		$this->password = $pswd;  
	}
	function getPassword (){
		return $this->password;  
	}
	function setAdmin ($adm){
		$this->admin = $adm;  
	}
	function getAdmin (){
		return $this->admin;  
	}
}