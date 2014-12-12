<?php 

class Logout
{
	public function run() 
	{
		session_destroy();
		header('Location:' . SITE_URL);
	}
}