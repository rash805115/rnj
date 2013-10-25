<?php
namespace phpsec;


class XUserException extends \Exception {}
class InvalidAddress extends XUserException {}


class XUser extends User
{
	
	
	
	/**
	 * First name of the user
	 * @var string
	 */
	public $firstName = NULL;
	
	
	
	/**
	 * Last name of the user
	 * @var string
	 */
	public $lastName = NULL;
	
	
	
	/**
	 * Date of Birth of the user
	 * @var int
	 */
	public $dob = NULL;
	
	
	
	public $type = NULL;
	public $zip = NULL;
	public $streetaddr = NULL;






	/**
	 * Minimum age that is required for all users
	 * @var int
	 */
	public static $minAge = 378684000;	//12 years.
	
	
	
	/**
	 * Constructor of this class.
	 * @param \phpsec\User $userObj		The object of class \phpsec\User
	 */
	public function __construct($userObj, $zip)
	{
		try
		{
			$this->userID = $userObj->getUserID();
		}
		catch (\Exception $e)
		{
			throw new UserNotExistsException("ERROR: This user does not exists!");
		}
		
		if (! XUser::isXUserExists($this->userID))	//If user's records are not present in the DB, then insert them
		{
			$rowsAffected = SQL("INSERT INTO XUSER (`USERID`, `zip`) VALUES (?, ?)", array($this->userID, $zip));
			
			if ($rowsAffected == 0)
			{
				throw new InvalidAddress("ERROR: This address looks invalid. Please enter correct zipcode.");
			}
		}
	}
	
	
	
	/**
	 * To check if the user's record are present in the DB or not.
	 * @param string $userID	The userID of the user
	 * @return boolean		Returns true if the user is present. False otherwise
	 */
	protected static function isXUserExists($userID)
	{
		$result = SQL("SELECT USERID FROM XUSER WHERE USERID = ?", array($userID));
		return (count($result) == 1);
	}
	
	
	
	/**
	 * To set the first name and last name of the user
	 * @param string $firstName	The first name of the user
	 * @param string $lastName	The last name of the user
	 */
	public function setName($firstName, $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		
		SQL("UPDATE XUSER SET `FIRST_NAME` = ?, `LAST_NAME` = ? WHERE USERID = ?", array($this->firstName, $this->lastName, $this->userID));
	}
	
	
	
	/**
	 * To set the DOB of the user
	 * @param int $dob	The DOB of the user
	 */
	public function setDOB($dob)
	{
		$dob = (int)$dob;
		//here put code to convert data from given type to unix timestamp
		if ( $dob < time() )	//The given DOB is in past because DOB's cant be in future
		{
			$this->dob = $dob;
			SQL("UPDATE XUSER SET `DOB` = ? WHERE USERID = ?", array($this->dob, $this->userID));
		}
	}
	
	
	
	/**
	 * TO check if the age of the user satisfies the age criteria
	 * @return boolean	Returns true if the age is greater than the minimum age. False otherwise
	 */
	public function ageCheck()
	{
		$result = SQL("SELECT `DOB` FROM XUSER WHERE USERID = ?", array($this->userID));
		
		if ( (time() - $result[0]['DOB']) < XUser::$minAge )
			return FALSE;

		return TRUE;
	}
	
	
	
	public function isTypeSet()
	{
		$result = SQL("SELECT type FROM XUSER WHERE USERID = ?", array($this->userID));
		
		if (count($result) == 1)
		{
			if ( ($result[0]['type'] == 'e')  || ($result[0]['type'] == 'c'))
				return $result[0]['type'];
		}
		
		return FALSE;
	}
	
	
	
	public function setType($type)
	{
		$this->type = $type;
		SQL("UPDATE XUSER SET type = ? WHERE USERID = ?", array($type, $this->userID));
	}
	
	
	
	public function setZip($zip)
	{
		$this->zip = $zip;
		
		$rowsAffected = SQL("UPDATE XUSER SET zip = ? WHERE USERID = ?", array($zip, $this->userID));
		
		if ($rowsAffected == 0)
			throw new InvalidAddress("ERROR: This address looks invalid. Please enter correct zipcode.");
	}
	
	
	
	public function setStreetAddress($streetaddr)
	{
		$this->streetaddr = $streetaddr;
		SQL("UPDATE XUSER SET streetaddr = ? WHERE USERID = ?", array($streetaddr, $this->userID));
	}
	
	
	
	/**
	 * To delete the current user's record from the DB
	 */
	public function deleteXUser()
	{
		SQL("DELETE FROM XUSER WHERE USERID = ?", array(  $this->userID));
	}
}