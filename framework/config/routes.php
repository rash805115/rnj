<?php 
namespace phpsec\framework;
/**
 * Specify routes here.
 * The keys are URLs, the values are the controller that will be called
 * Priority is based on the array, so keep the wildcard default on last line.
 * Wildcards can be used to point to DefaultControllers
 * @note: wildcards only supported at the rightmost character
 */

FrontController::$Routes["products"] =			"general/productcontroller";			//controller to show products on the page
FrontController::$Routes["productinfo"] =		"general/productinfocontroller";		//controller to show info on individual product
FrontController::$Routes["home"] =			"general/showasiscontroller";			//the first page for users (non-logged users)
FrontController::$Routes["login"] =			"users/userslogincontroller";			//for user login
FrontController::$Routes["logout"] =			"users/userlogoutcontroller";			//for user logout
FrontController::$Routes["users/index"] =		"users/userindexcontroller";			//the first page for users (logged users)
FrontController::$Routes["users/employee"] =		"users/useremployeecontroller";			//the first page for employees (logged users)
FrontController::$Routes["users/viewstats"] =		"users/viewstatscontroller";			//for employees to see stats and queries (logged users)
FrontController::$Routes["cart"] =			"users/usercartcontroller";			//the user's shopping cart (logged users)
FrontController::$Routes["users/interests"] =		"users/userinterestscontroller";		//the users interest page (logged users)
FrontController::$Routes["users/settings"] =		"users/usersettingscontroller";			//the users settings page (logged users)
FrontController::$Routes["signup"] =			"users/usersignupcontroller";			//for user signup
FrontController::$Routes["users/updateaccount"] =	"users/useraccountupdatecontroller";		//for user to update their account
FrontController::$Routes["forgotpassword"] =		"users/forgotpasswordcontroller";		//for user forgot password
FrontController::$Routes["requestnewpassword"] =		"users/requestnewpasswordcontroller";		//for user setting new password after forgot password
FrontController::$Routes["temppass"] =			"users/temppasscontroller";			//for account activation and temp password management
FrontController::$Routes["users/passwordreset"] =	"users/passwordresetcontroller";		//for user password reset(logged users)
FrontController::$Routes["*"] =				"default";					//route everything else to default
