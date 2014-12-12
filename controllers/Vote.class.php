<?php 
class Vote
{
	public function run()
	{
		// pole sisse loginud
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1)
		{
			$view = new View();
			$view->setTemplateFile('views/login_error.php');
			echo $view->render();
			return;
		}
		
		$gp = new GalleryPictures();
		$view = new View();
		$view->addViewVar('galleryPics', $gp->getAllGalleryPics());
		$view->setTemplateFile('views/vote.php');
		echo $view->render();
	}
}