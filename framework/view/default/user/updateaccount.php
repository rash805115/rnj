<?php

?>
<html>
	<head>
		<title>RNJ: Update Account Information</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
		<?php include (__DIR__ . "/../../default/include.php"); ?>
		
		<div name="update-acc-div" id="update-acc-div">
			<form method="POST" action="" name="update-acc-form" id="update-acc-form">
				<table name="personal-info-table" id="personal-info-table">
					<tr name="firstname-field" id="firstname-field">
						<td><label>First Name *:</label></td>
						<td><input type="text" name="fname" id="fname" maxlength="40" onblur="return verifyNames('fname');"></td>
					</tr>
					<tr name="lastname-field" id="lastname-field">
						<td><label>Last Name *:</label></td>
						<td><input type="text" name="lname" id="lname" maxlength="40" onblur="return verifyNames('lname');"></td>
					</tr>
					<tr name="dob-field" id="dob-field">
						<td><label>Date of Birth:</label></td>
						<td><input type="text" name="dob" id="dob" maxlength="128"></td>
					</tr>
					<tr name="zip-field" id="zip-field">
						<td><label>Zip *:</label></td>
						<td><input type="text" name="zip" id="zip" maxlength="11" onblur="return verifyZip('zip');"></td>
					</tr>
					<tr name="streetaddr-field" id="streetaddr-field">
						<td><label>Street Address:</label></td>
						<td><textarea name="streetaddr" id="streetaddr" rows="5" cols="40"></textarea></td>
					</tr>
				</table>
				
				<div name="type-of-user-div" id="type-of-user-div">
					<label>Type of user *:</label>
					<select name="type-of-user-select" id="type-of-user-select">
						<option value="customer">Customer</option>
						<option value="employee">Employee</option>
					</select>
				</div>
				
				<div name="type-of-customer-div" id="type-of-customer-div">
					<label>Type of customer *:</label>
					<select name="type-of-customer-select" id="type-of-customer-select">
						<option value="business_customer">Business Customer</option>
						<option value="home_customer">Home Customer</option>
					</select>
				</div>
				
				<div name="business-customer-detail" id="business-customer-detail">
					<table name="business-customer-table" id="business-customer-table">
						<tr name="company-name-field" id="company-name-field">
							<td><label>Company that you work for:</label></td>
							<td><input type="text" name="company-name" id="company-name" maxlength="50"></td>
						</tr>
						<tr name="business-annual-income-field" id="business-annual-income-field">
							<td><label>Your Annual Income:</label></td>
							<td><input type="text" name="business-annual-income" id="business-annual-income" maxlength="15"></td>
						</tr>
					</table>
				</div>
				
				<div name="home-customer-detail" id="home-customer-detail">
					<label>Your Gender:</label>
					<select name="home-gender" id="home-gender">
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
					<BR>
					<label>Your Marital Status:</label>
					<select name="home-maritalstatus" id="home-maritalstatus">
						<option value="married">Married</option>
						<option value="single">Single</option>
						<option value="divorced">Divorced</option>
					</select>
					<table name="home-customer-table" id="home-customer-table">
						<tr name="annual-income-field" id="annual-income-field">
							<td><label>Your Annual Income:</label></td>
							<td><input type="text" name="home-annual-income" id="home-annual-income" maxlength="15"></td>
						</tr>
					</table>
				</div>
				
				<div name="employee-detail" id="employee-detail">
					<table name="employee-table" id="employee-table">
						<tr name="employee-title-field" id="employee-title-field">
							<td><label>Your designation in this company:</label></td>
							<td><input type="text" name="employee-title" id="employee-title" maxlength="100"></td>
						</tr>
						<tr name="employee-salary-field" id="employee-salary-field">
							<td><label>Your Annual Income:</label></td>
							<td><input type="text" name="employee-annual-income" id="employee-annual-income" maxlength="15"></td>
						</tr>
					</table>
				</div>
				
				<input type="submit" name="submit" id="submit" value="Submit">
				<input type="reset" name="reset" id="reset" value="Reset">
			</form>
		</div>
		
		<script type="text/javascript" <?php echo('src="' . "http://localhost/rnj/framework/file/js/jquery.js" . '"'); ?> ></script>
		<script type="text/javascript" <?php echo('src="' . "http://localhost/rnj/framework/file/js/updateaccount.js" . '"'); ?> ></script>
	</body>
</html>