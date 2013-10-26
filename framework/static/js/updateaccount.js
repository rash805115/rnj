//Javascript specific to file view/default/user/updateaccount.php


/**
 * First Code to run, to see which items to show and which not to.
 */
if ( $("#type-of-user-select").val() == "employee")
{
	$("#business-customer-detail").hide();
	$("#home-customer-detail").hide();
	$("#type-of-customer-div").hide();
	$("#employee-detail").show();
}
if ( $("#type-of-user-select").val() == "customer")
{
	$("#employee-detail").hide();
	$("#type-of-customer-div").show();
	
	if ($("#type-of-customer-select").val() === "business_customer")
	{
		$("#home-customer-detail").hide();
		$("#employee-detail").hide();
		$("#business-customer-detail").show();
	}

	if($("#type-of-customer-select").val() === "home_customer")
	{
		$("#business-customer-detail").hide();
		$("#employee-detail").hide();
		$("#home-customer-detail").show();
	}
}



/**
 * Function to run when the mentioned drop down is clicked.
 */
$("#type-of-user-select").click(
	function()
	{
		if ($("#type-of-user-select").val() === "customer")
		{
			$("#employee-detail").hide();
			$("#type-of-customer-div").show();
		}
		else if ($("#type-of-user-select").val() === "employee")
		{
			$("#business-customer-detail").hide();
			$("#home-customer-detail").hide();
			$("#type-of-customer-div").hide();
			$("#employee-detail").show();
		}
	}
);

/**
 * Function to run when the mentioned drop down is clicked.
 */
$("#type-of-customer-select").click(
	function ()
	{
		if ($("#type-of-customer-select").val() === "business_customer")
		{
			$("#home-customer-detail").hide();
			$("#employee-detail").hide();
			$("#business-customer-detail").show();
		}
		else if($("#type-of-customer-select").val() === "home_customer")
		{
			$("#business-customer-detail").hide();
			$("#employee-detail").hide();
			$("#home-customer-detail").show();
		}
	}
);

/**
 * Function to be implemented by all required fields
 * @param {type} elementID
 * @returns {Boolean}
 */
function requiredFields(elementID)
{
	if ($("#" + elementID).val() == "")
	{
		alert("This field is required. You cannot leave it blank!");
		return false;
	}
}

/**
 * Function to check the validity for names
 * @param {type} elementID
 * @returns {Boolean}
 */
function verifyNames(elementID)
{
	requiredFields(elementID);

	if (! $("#" + elementID).val().match(/^[a-zA-Z]+$/))
	{
		alert("This doesn't look like a valid name. Are you sure its your name ^_^. Enter again. We do not accept special characters!");
		return false;
	}

	return true;
}

/**
 * Function to check the validity for zip codes
 * @param {type} elementID
 * @returns {Boolean}
 */
function verifyZip(elementID)
{
	requiredFields(elementID);

	if (! $("#" + elementID).val().match(/(^\d{5}$)/g))	//USA zip codes for this application will be only 5 digits.
	{
		alert("This doesn't look like a valid zip! Please enter a correct zip code.");
		return false;
	}

	return true;
}


function verifyStreetAddress(elementID)
{
	var value = document.getElementById(elementID).value;

	if (! $("#" + elementID).val().match(/^[a-z0-9A-Z_@.\-/\n\,]*$/))
	{
		alert("Street Address can only contain a-z A-Z 0-9 - . _ ,");
		return false;
	}

	return true;
}


function verifyAlbhabeticField(elementID)
{
	var value = document.getElementById(elementID).value;

	if (! $("#" + elementID).val().match(/^[a-zA-Z0-9]*$/))
	{
		alert("This field can only contain these things a-z A-Z 0-9");
		return false;
	}

	return true;
}


function verifyNumericField(elementID)
{
	var value = document.getElementById(elementID).value;

	if (! $("#" + elementID).val().match(/^(\d)*$/))
	{
		alert("This field can only contain digits 0-9");
		return false;
	}

	return true;
}