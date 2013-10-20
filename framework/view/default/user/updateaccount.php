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
						<td><label>First Name:</label></td>
						<td><input type="text" name="fname" id="fname" maxlength="40"></td>
					</tr>
					<tr name="lastname-field" id="lastname-field">
						<td><label>Last Name:</label></td>
						<td><input type="text" name="lname" id="lname" maxlength="40"></td>
					</tr>
					<tr name="secondary-email-field" id="secondary-email-field">
						<td><label>Secondary E-Mail:</label></td>
						<td><input type="text" name="semail" id="semail" maxlength="128"></td>
					</tr>
					<tr name="dob-field" id="dob-field">
						<td><label>Date of Birth:</label></td>
						<td><input type="text" name="dob" id="dob" maxlength="128"></td>
					</tr>
					<tr name="zip-field" id="zip-field">
						<td><label>Zip:</label></td>
						<td><input type="text" name="zip" id="zip" maxlength="11"></td>
					</tr>
					<tr name="streetaddr-field" id="streetaddr-field">
						<td><label>Street Address:</label></td>
						<td><textarea name="streetaddr" id="streetaddr" rows="5" cols="40"></textarea></td>
					</tr>
					<tr name="city-field" id="city-field">
						<td><label>City:</label></td>
						<td><input type="text"  name="city" id="city" maxlength="60"></td>
					</tr>
					<tr name="state-field" id="state-field">
						<td><label>State:</label></td>
						<td>
							<select name="state">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AB">Alberta</option>
								<option value="AS">American Samoa</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="AA">Armed Forces Americas</option>
								<option value="AE">Armed Forces Europe</option>
								<option value="AP">Armed Forces Pacific</option>
								<option value="BC">British Columbia</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="GU">Guam</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MB">Manitoba</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NB">New Brunswick</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NF">Newfoundland</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="MP">Northern Mariana Is</option>
								<option value="NT">Northwest Territories</option>
								<option value="NS">Nova Scotia</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="ON">Ontario</option>
								<option value="OR">Oregon</option>
								<option value="PW">Palau</option>
								<option value="PA">Pennsylvania</option>
								<option value="PE">Prince Edward Island</option>
								<option value="PQ">Province du Quebec</option>
								<option value="PR">Puerto Rico</option>
								<option value="RI">Rhode Island</option>
								<option value="SK">Saskatchewan</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VI">Virgin Islands</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
								<option value="YT">Yukon Territory</option>
							</select>
						</td>
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