<?php

class UsersLoginController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		try
		{echo \rand(0, 100);
			$config = require_once (__DIR__ . "/../../config/config.php");
			$userID = \phpsec\User::checkRememberMe();
			
			if (! $userID)
			{
				if ((isset($_POST['submit'])))
				{echo "i come here" . \rand(0, 1000);
					if( (isset($_POST['user'])) && ($_POST['user'] != "") && (isset($_POST['pass'])) && ($_POST['pass'] != "") )
					{echo $_POST['user'];
						try
						{
							$userID = $_POST['user'];
							$userObj = phpsec\UserManagement::logIn($_POST['user'], $_POST['pass']);
						}
						catch (phpsec\WrongPasswordException $e)
						{
							if ($config['BRUTE_FORCE_DETECTION'] === "ON")
							{
								try
								{
									new phpsec\AdvancedPasswordManagement($_POST['user'], $_POST['pass'], TRUE);
								}
								catch (phpsec\BruteForceAttackDetectedException $ex)
								{
									\phpsec\User::lockAccount($_POST['user']);
									$this->error .= "Brute Force Attack detected on this account. This account has now been locked. If its not your fault, then please contact the administrator." . "<BR>";
								}
							}

							$this->error .= "Incorrect Username/Password combination!" . "<BR>";
							return require_once (__DIR__ . "/../../view/default/user/login.php");
						}

						if( (isset($_POST['remember-me'])) && ($_POST['remember-me'] == "on") )
						{
							if (phpsec\HttpRequest::isHTTPS())
							{
								phpsec\User::enableRememberMe($_POST['user']);
							}
							else
							{
								phpsec\User::enableRememberMe($_POST['user'], FALSE, TRUE);
							}
						}
						
						unset($_POST['submit']);
						unset($_POST['user']);
						unset($_POST['pass']);
						unset($_POST['remember-me']);
					}
					else
						$this->error .= "Empty fields are not allowed. Please fill the required areas." . "<BR>";
				}
				else
					return require_once (__DIR__ . "/../../view/default/user/login.php");
			}
			
			$userSession = new phpsec\Session();
			
			try
			{
				$sessionID = $userSession->existingSession();
				
				if ($sessionID)
				{
					$userSessionID = $userSession->rollSession();
				}
				else
				{
					$userSessionID = $userSession->newSession($userID);
				}

				$userObj = phpsec\UserManagement::forceLogIn($userID);

				if ($userObj->isPasswordExpired() )
				{
					$this->info .= "Its been too long since you have changed your password. For security reasons, please change your password." . "<BR>";
				}
				
				return require_once(__DIR__ . "/../../view/default/user/index.php");
			}
			catch (\phpsec\SessionExpired $e)
			{
				$this->error .= $e->getMessage() . "<BR>";
				phpsec\User::deleteAuthenticationToken();
			}
		}
		catch (Exception $e)
		{
			$this->error .= $e->getMessage() . "<BR>";
		}
		
		return require_once (__DIR__ . "/../../view/default/user/login.php");
	}
}


?>