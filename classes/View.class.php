<?php 

class View
{
	protected $viewVars = array();
	protected $templateFile;
	
	public function addViewVar($key, $val)// saad lisada muutujate paari
	{
		$this->viewVars[$key] = $val;
	}
	
	/* $fileDir - path to file */
	public function setTemplateFile($fileDir)
	{
		$this->templateFile = $fileDir;
	}
		
	public function render() //paneb view kokku paneb template faili, extract teeb massiivist üksikud muutujad
	{
		ob_start();  //out put puhver, view faili paneb kokku ja tuleb stringina
		extract($this->viewVars);
		include $this->templateFile;
		$view = ob_get_contents();//out pu puhvrist võtab faili kõik htmli ja muud asjad
		ob_end_clean();//koristab outputi puhtaks
		return $view;
	}
}