<?php

require_once 'functions.php';

class FeedBackMsg
{
	public function getAllFeedBack()
	{
		return db_all_feedback();
	}

	public function getUserFeedBack($user_id)
	{
		return db_user_feedback($user_id);
	}
}