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