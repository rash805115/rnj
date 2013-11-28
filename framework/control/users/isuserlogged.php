<?php
	try
	{
		$userSession = new phpsec\Session();
		$sessionID = $userSession->existingSession();

		if ($sessionID != FALSE)
		{
			$userID = \phpsec\Session::getUserIDFromSessionID($sessionID);
			return $userID;
		}
		else
		{
			return FALSE;
		}
	}
	catch (Exception $e)
	{
		return FALSE;
	}
?>
