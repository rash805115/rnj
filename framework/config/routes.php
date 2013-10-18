<?php 
namespace phpsec\framework;
/**
 * Specify routes here.
 * The keys are URLs, the values are the controller that will be called
 * Priority is based on the array, so keep the wildcard default on last line.
 * Wildcards can be used to point to DefaultControllers
 * @note: wildcards only supported at the rightmost character
 */

FrontController::$Routes["home"] =			"general/indexcontroller";			//the first page for users
FrontController::$Routes["login"] =			"users/userslogincontroller";			//for user login
FrontController::$Routes["logout"] =			"users/userlogoutcontroller";			//for user login
FrontController::$Routes["user/index"] =			"users/userindexcontroller";			//the first page for users
FrontController::$Routes["signup"] =			"users/usersignupcontroller";			//for user signup
FrontController::$Routes["temppass"] =			"users/temppasscontroller";			//for account activation and temp password management
FrontController::$Routes["passwordreset"] =		"users/passwordresetcontroller";		//for account activation and temp password management
FrontController::$Routes["*"] =				"default";					//route everything else to default
