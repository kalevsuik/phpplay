<?php 
class result
{
	public function run() 
	{
		$gp = new GalleryPictures();
		
		$view = new View();
		$view->addViewVar('galleryPics', $gp->getAllGalleryPics());
		$view->setTemplateFile('views/result.php');
		echo $view->render();
	}
}