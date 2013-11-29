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
					$userObj = phpsec\UserManagement::forceLogIn($userID);
					$xuserObj = new phpsec\XUser($userObj, $_POST['zip']);

					$xuserObj->setName($_POST['fname'], $_POST['lname']);

					if ( isset($_POST['dob']) && ($_POST['dob'] != "") )
					{
						$xuserObj->setDOB($_POST['dob']);
					}

					if ( isset($_POST['streetaddr']) && ($_POST['streetaddr'] != "") )
					{
						$xuserObj->setStreetAddress($_POST['streetaddr']);
					}
					
					$previousType = phpsec\SQL("SELECT type FROM XUSER WHERE USERID = ?", array($userID));
					if ( isset($_POST['type-of-user-select']) && (count($previousType) > 0) && ($previousType[0]['type'] != NULL) && ($previousType[0]['type'] != $_POST['type-of-user-select']) )
						throw new \Exception("ERROR: You cannot change your account type once set.");
					
					if ( isset($_POST['type-of-user-select']) && ($_POST['type-of-user-select'] == "customer") )
					{
						$result = phpsec\SQL("SELECT USERID FROM customer where USERID = ?", array($userID));
						if (count($result) == 0)
						{
							phpsec\SQL("INSERT INTO customer (USERID) VALUES (?)", array($userID));
						}
						
						if ( isset($_POST['type-of-customer-select']) && ($_POST['type-of-customer-select'] == "business_customer") )
						{
							$xuserObj->setType("c-b");
							
							$result = phpsec\SQL("SELECT USERID FROM businesscustomer where USERID = ?", array($userID));
							if (count($result) == 0)
							{
								phpsec\SQL("INSERT INTO businesscustomer (USERID) VALUES (?)", array($userID));
							}
							
							if ( isset($_POST['company-name']) && ($_POST['company-name'] != "") )
							{
								phpsec\SQL("UPDATE businesscustomer SET companyname = ? WHERE USERID = ?", array($_POST['company-name'], $userID));
							}
							
							if ( isset($_POST['business-annual-income']) && ($_POST['business-annual-income'] != "") )
							{
								phpsec\SQL("UPDATE businesscustomer SET annualincome = ? WHERE USERID = ?", array($_POST['business-annual-income'], $userID));
							}
						}
						
						elseif ( isset($_POST['type-of-customer-select']) && ($_POST['type-of-customer-select'] == "home_customer") )
						{
							$xuserObj->setType("c-h");
							
							$result = phpsec\SQL("SELECT USERID FROM homecustomer where USERID = ?", array($userID));
							if (count($result) == 0)
							{
								phpsec\SQL("INSERT INTO homecustomer (USERID) VALUES (?)", array($userID));
							}
							
							if ( isset($_POST['home-gender']) && ($_POST['home-gender'] != "") )
							{
								phpsec\SQL("UPDATE homecustomer SET gender = ? WHERE USERID = ?", array($_POST['home-gender'], $userID));
							}
							
							if ( isset($_POST['home-maritalstatus']) && ($_POST['home-maritalstatus'] != "") )
							{
								phpsec\SQL("UPDATE homecustomer SET marriage = ? WHERE USERID = ?", array($_POST['home-maritalstatus'], $userID));
							}
							
							if ( isset($_POST['home-annual-income']) && ($_POST['home-annual-income'] != "") )
							{
								phpsec\SQL("UPDATE homecustomer SET income = ? WHERE USERID = ?", array($_POST['home-annual-income'], $userID));
							}
						}
						
					}
					
					elseif ( isset($_POST['type-of-user-select']) && ($_POST['type-of-user-select'] == "employee") )
					{
						$xuserObj->setType("e");
						
						$result = phpsec\SQL("SELECT USERID FROM employee where USERID = ?", array($userID));
						if (count($result) == 0)
						{
							phpsec\SQL("INSERT INTO employee (USERID) VALUES (?)", array($userID));
						}
						
						if ( isset($_POST['employee-title']) && ($_POST['employee-title'] != "") )
						{
							phpsec\SQL("UPDATE employee SET title = ? WHERE USERID = ?", array($_POST['employee-title'], $userID));
						}
						
						if ( isset($_POST['employee-annual-income']) && ($_POST['employee-annual-income'] != "") )
						{
							phpsec\SQL("UPDATE employee SET salary = ? WHERE USERID = ?", array($_POST['employee-annual-income'], $userID));
						}
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