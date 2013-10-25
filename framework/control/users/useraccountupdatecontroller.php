<?php

class UserAccountUpdateController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		
		$userSession = new phpsec\Session();
		$sessionID = $userSession->existingSession();

		if ($sessionID == FALSE)
		{
			$newLocation = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/home";
			header("Location: {$newLocation}");
		}
		
		try
		{
			$userID = \phpsec\Session::getUserIDFromSessionID($sessionID);
			
			if ( isset($_POST['submit']) )
			{
				if ( (isset($_POST['fname'])) && ($_POST['fname'] != "") && (isset($_POST['lname'])) && ($_POST['lname'] != "") && (isset($_POST['zip'])) && ($_POST['zip'] != "") )
				{
					if ( (preg_match("/^[a-zA-Z]+$/", $_POST['fname'])) && (preg_match("/^[a-zA-Z]+$/", $_POST['lname'])) && (preg_match("/^[0-9]+$/", $_POST['zip'])) )
					{
						$userObj = phpsec\UserManagement::forceLogIn($userID);
						$xuserObj = new phpsec\XUser($userObj, $_POST['zip']);

						$xuserObj->setName($_POST['fname'], $_POST['lname']);
						
						if ( (isset($_POST['semail'])) && ($_POST['semail'] != "") )
						{
							if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,63})$/', $_POST['semail']))
							{
								$this->error .= "Invalid email address." . "<BR>";
								return require_once(__DIR__ . "/../../view/default/user/updateaccount.php");
							}
							
							$xuserObj->setSecondaryEmail($_POST['semail']);
						}
					}
					else
					{
						$this->error .= "This doesn't look valid. Are you sure its ok? Enter again. We do not accept special characters!" . "<BR>";
					}
				}
				else
				{
					$this->error .= "'*' marked fields are empty. You cannot leave them blank!" . "<BR>";
				}
			}
		}
		catch (Exception $e)
		{
			$this->error .= $e->getMessage() . "<BR>";
		}
		
		return require_once (__DIR__ . "/../../view/default/user/updateaccount.php");
	}
}

?>