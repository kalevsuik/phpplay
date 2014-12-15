<?php

class FeedBackMsg
{
	public function getAllFeedBack()
	{
		$pildid = array(
			array('user' => 'uks','location' => 'Monterey 1', 'feedback' => 'kena kohake 1'),
			array('user' => 'uks','location' => 'Monterey 2', 'feedback' => 'pole paha'),
			array('user' => 'kolm','location' => 'Monterey 1', 'feedback' => 'jube urgas'),
			array('user' => 'kaks','location' => 'Monterey 1', 'feedback' => 'pandav pleiss'),
			array('user' => 'kaks','location' => 'Surmaorg 1', 'feedback' => 'surm siinv õi siberis'),
			array('user' => 'neli','location' => 'Surmaorg 2', 'feedback' => 'mehed ming ka'),
		);
		return $pildid;
	}

	public function getUserFeedBack($user_id)
	{
		$pildid = array(
			array('location' => 'Monterey 1', 'feedback' => 'kena kohake 1'),
			array('location' => 'Monterey 2', 'feedback' => 'pole paha'),
			array('location' => 'Monterey 1', 'feedback' => 'jube urgas'),
			array('location' => 'Monterey 1', 'feedback' => 'pandav pleiss'),
			array('location' => 'Surmaorg 1', 'feedback' => 'surm siin või siberis'),
			array('location' => 'Surmaorg 2', 'feedback' => 'mehed ming ka'),
		);
		return $pildid;
		//return db_user_feedback($user_id);
	}
}