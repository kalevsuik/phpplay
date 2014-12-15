<?php 

class Feedback
{
	public function run()
	{
		// pole sisse loginud
		//print "<BR>user_id".$_SESSION['user_id']."<BR>";
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1)
		{
			$view = new View();
			$view->setTemplateFile('views/login_error.php');
			echo $view->render();
			return;
		}


		$fb = new FeedBackMsg();
		$view = new View();

		//print_r($_POST);
		if(isset($_POST['Asukoht'])){
			$location = db_quote($_POST['Asukoht']);
			$feedback = db_quote($_POST['vabatekst']);
			$user_id=$_SESSION['user_id'];
			if(db_add_feedback($user_id,$location,$feedback)){
				$view->addViewVar('newfeedback', "Lisatud");
			}else{
				$view->addViewVar('newfeedback', "Lisamine ebaõnnestus!");
			}
			
		}
		
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			$view->addViewVar('fullfeedback', db_all_feedback());
		}else{
			$ar=db_user_feedback($_SESSION['user_id']);
			$view->addViewVar('feedback',  $ar);
			//$view->addViewVar('feedback',  $fb->getUserFeedBack($_SESSION['user_id']));
		}
		$view->setTemplateFile('views/feedback.php');
		echo $view->render();
	}
}