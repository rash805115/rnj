$("#type-of-customer-div").hide();
$("#business-customer-detail").hide();
$("#home-customer-detail").hide();
$("#employee-detail").hide();
	
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
	
	
	
	
function verifyNames(elementID)
{
	if ($("#" + elementID).val() == "")
	{
		alert("This field is required. You cannot leave it blank!");
		return false;
	}
	
	if (! $("#" + elementID).val().match(/^[a-zA-Z]+$/))
	{
		alert("This doesn't look like a valid name. Are you sure its your name ^_^. Enter again. We do not accept special characters!");
		return false;
	}
	
	return true;
}

function verifyZip(elementID)
{
	if ($("#" + elementID).val() == "")
	{
		alert("This field is required. You cannot leave it blank!");
		return false;
	}
	
	if (! $("#" + elementID).val().match(/^[0-9]+$/))	//add a better regex here
	{
		alert("This doesn't look like a valid zip! Please enter a correct zip code.");
		return false;
	}
	
	return true;
}