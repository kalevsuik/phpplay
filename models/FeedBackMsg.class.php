<?php

class FeedBackMsg
{
	public function getAllFeedBack()
	{
		$pildid = array(
			array('user' => 1,'location' => 'Monterey 1', 'feedback' => 'kena kohake 1'),
			array('user' => 1,'location' => 'Monterey 2', 'feedback' => 'pole paha'),
			array('user' => 3,'location' => 'Monterey 1', 'feedback' => 'jube urgas'),
			array('user' => 2,'location' => 'Monterey 1', 'feedback' => 'pandav pleiss'),
			array('user' => 2,'location' => 'Surmaorg 1', 'feedback' => 'surm siinv õi siberis'),
			array('user' => 4,'location' => 'Surmaorg 2', 'feedback' => 'mehed ming ka'),
		);
		return $pildid;
	}

	public function getUserFeedBack($user_id)
	{
		$pildid = array(
			array('user' => $user_id,'location' => 'Monterey 1', 'feedback' => 'kena kohake 1'),
			array('user' => $user_id,'location' => 'Monterey 2', 'feedback' => 'pole paha'),
			array('user' => $user_id,'location' => 'Monterey 1', 'feedback' => 'jube urgas'),
			array('user' => $user_id,'location' => 'Monterey 1', 'feedback' => 'pandav pleiss'),
			array('user' => $user_id,'location' => 'Surmaorg 1', 'feedback' => 'surm siin või siberis'),
			array('user' => $user_id,'location' => 'Surmaorg 2', 'feedback' => 'mehed ming ka'),
		);
		return $pildid;
	}
}