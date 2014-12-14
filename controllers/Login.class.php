<?php 
class Login


{
	public function run()//peab koigis kontrollerites olema
	{
		
		/*$users = array(
			'kaire' => array(
				'password' => 'üübersiikrit',
				'firstname' => 'Kaire',
				'lastname' => 'Saadi',
				),
			);*/
		$users = db_get_users();
		$reqUsername = isset($_POST['username']) ? $_POST['username'] : ''; // kui username on olemas, siis votab selle, muul juhul jatab tyhjaks
		$reqPassword = isset($_POST['password']) ? $_POST['password'] : '';
		
		$user = (array_key_exists($reqUsername, $users)) ? $users[$reqUsername] : array();
		//kontrollib kas users massiivis on vaartus olemas
		
		if (!empty($user) && $reqPassword === $user['password'])//upper ja lower case kontroll
		{
			$_SESSION['logged_in'] = 1;
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
}