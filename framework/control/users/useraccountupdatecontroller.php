<?php

class UserAccountUpdateController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		try
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
			
			$userID = \phpsec\Session::getUserIDFromSessionID($sessionID);
			
			if ( isset($_POST['submit']) )
			{
				if ( (isset($_POST['fname'])) && ($_POST['fname'] != "") && (isset($_POST['lname'])) && ($_POST['lname'] != "") && (isset($_POST['zip'])) && ($_POST['zip'] != "") )
				{
					if ( (preg_match("/^[a-zA-Z]+$/", $_POST['fname'])) && (preg_match("/^[a-zA-Z]+$/", $_POST['lname'])) )
					{
						if ( (preg_match("/(^\d{5}$)/", $_POST['zip'])) )
						{
							$userObj = phpsec\UserManagement::forceLogIn($userID);
							$xuserObj = new phpsec\XUser($userObj, $_POST['zip']);

							$xuserObj->setName($_POST['fname'], $_POST['lname']);
						}
						else
						{
							$this->error .= "Zip is not valid." . "<BR>";
						}
					}
					else
					{
						$this->error .= "Names are not valid. Are you sure its ok? Enter again. We do not accept special characters!" . "<BR>";
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