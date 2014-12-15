<?php 
class Login


{


	public function run()//peab koigis kontrollerites olema
	{
		//print_r($_POST);
		if(isset($_POST['first_name'])){
			$this->do_add_user();
		}else{
			$this->do_login();
		}
	}

	function do_login(){
		$users = db_get_users();
		//actually error should be asked and directed to error page
		//b9826cfcb8be9c90ba1b0adb1219c39efffd98c7

		//print_r ($users);

		$reqUsername = isset($_POST['username']) ? $_POST['username'] : ''; // kui username on olemas, siis votab selle, muul juhul jatab tyhjaks
		$reqPassword = isset($_POST['password']) ? $_POST['password'] : '';
		
		$user = (array_key_exists($reqUsername, $users)) ? $users[$reqUsername] : array();
		//kontrollib kas users massiivis on vaartus olemas
		
		if (!empty($user) && $reqPassword === $user['password'])//upper ja lower case kontroll
		{
			$_SESSION['logged_in'] = 1;
			$_SESSION['id'] = $user['id'];
			$_SESSION['admin'] = $user['admin'];
			$_SESSION['fullname'] = $user['firstname'] . ' ' . $user['lastname'];
			session_write_close();//sessiooni lopetamiseks
			header('Location:' . SITE_URL);// redirectimine
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

	function do_add_user(){
		$errormsgs = '';
		$users = db_get_users();
		$reqUsername = db_quote($_POST['username']);


		if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {

			$user = (array_key_exists($reqUsername, $users)) ? $users[$reqUsername] : array();
			//kontrollib kas users massiivis on vaartus olemas
			if (!empty($user)) {
				$errormsgs = 'Selline kasutaja on juba olemas, proovi hoopis sisse logida!';
			}else{
				$firstname = db_quote($_POST['first_name']);
				$lastname = db_quote($_POST['last_name']);
				$email = db_quote($_POST['email']);
				$password = db_quote($_POST['password']);
				//$password = sha1($_POST['password']);

				if( ! db_add_user($reqUsername,$password,$firstname,$lastname,$email)){
					$errormsgs = 'Kasutaja lisamine ebaõnnestus !' ;
				}
			}

		} else {
			$errormsgs = 'Väljad ei ole korrektselt täidetud!';
		}

		$view = new View();
		if($errormsgs === ''){
			$view->addViewVar('username', $_POST['username']);
			$view->setTemplateFile('views/login.php');
		}else{
			$view->addViewVar('loginerror', $errormsgs);	
			$view->setTemplateFile('views/register.php');
		}
		echo $view->render();//
	}
}