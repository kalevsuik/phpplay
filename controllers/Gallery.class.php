<?php 

class Gallery
{
	public function run()  //siia panna massiv ja reurn ka
	{
		$gp = new GalleryPictures();
		$view = new View();
		$view->addViewVar('galleryPics', $gp->getAllGalleryPics());
		$view->setTemplateFile('views/gallery.php');
		echo $view->render();
	}
}