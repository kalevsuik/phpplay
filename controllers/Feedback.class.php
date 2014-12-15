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
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			$view->addViewVar('fullfeedback', $fb->getAllFeedBack());
		}else{
			$view->addViewVar('feedback', $fb->getUserFeedBack($_SESSION['user_id']));
		}
		$view->setTemplateFile('views/feedback.php');
		echo $view->render();
	}
}