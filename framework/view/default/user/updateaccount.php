<?php
	$result = phpsec\SQL("SELECT * FROM XUSER WHERE USERID = ?", array($userID));
	$resultFromType = "";
	
	if ($result[0]['type'] == "e")
	{
		$resultFromType = phpsec\SQL("SELECT * FROM employee WHERE USERID = ?", array($userID));
	}
	elseif($result[0]['type'] == "c-b")
	{
		$resultFromType = phpsec\SQL("SELECT * FROM businesscustomer WHERE USERID = ?", array($userID));
	}
	elseif($result[0]['type'] == "c-h")
	{
		$resultFromType = phpsec\SQL("SELECT * FROM homecustomer WHERE USERID = ?", array($userID));
	}
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
						<td><input type="text" name="fname" id="fname" maxlength="40" onblur="return verifyNames('fname');" value="<?php if(isset($result[0]['FIRST_NAME'])) echo $result[0]['FIRST_NAME'] ?>"></td>
					</tr>
					<tr name="lastname-field" id="lastname-field">
						<td><label>Last Name *:</label></td>
						<td><input type="text" name="lname" id="lname" maxlength="40" onblur="return verifyNames('lname');" value="<?php if(isset($result[0]['LAST_NAME'])) echo $result[0]['LAST_NAME'] ?>"></td>
					</tr>
					<tr name="dob-field" id="dob-field">
						<td><label>Date of Birth:</label></td>
						<td><input type="text" name="dob" id="dob" maxlength="128" value="<?php if(isset($result[0]['DOB'])) echo $result[0]['DOB'] ?>"></td>
					</tr>
					<tr name="zip-field" id="zip-field">
						<td><label>Zip *:</label></td>
						<td><input type="text" name="zip" id="zip" maxlength="5" onblur="return verifyZip('zip');" value="<?php if(isset($result[0]['zip'])) echo $result[0]['zip'] ?>"></td>
					</tr>
					<tr name="streetaddr-field" id="streetaddr-field">
						<td><label>Street Address:</label></td>
						<td><textarea name="streetaddr" id="streetaddr" rows="5" cols="40" onblur="return verifyStreetAddress('streetaddr');"><?php if(isset($result[0]['streetaddr'])) echo $result[0]['streetaddr']; ?></textarea></td>
					</tr>
				</table>
				
				<div name="type-of-user-div" id="type-of-user-div">
					<label>Type of user *:</label>
					<select name="type-of-user-select" id="type-of-user-select">
						<option value="customer" <?php if(isset($result[0]['type']) && $result[0]['type'] != "e") echo "selected"; ?>>Customer</option>
						<option value="employee" <?php if(isset($result[0]['type']) && $result[0]['type'] == "e") echo "selected"; ?>>Employee</option>
					</select>
				</div>
				
				<div name="type-of-customer-div" id="type-of-customer-div">
					<label>Type of customer *:</label>
					<select name="type-of-customer-select" id="type-of-customer-select" selected="<?php echo $selectUserSubType ?>">
						<option value="business_customer" <?php if(isset($result[0]['type']) && $result[0]['type'] == "c-b") echo "selected"; ?>>Business Customer</option>
						<option value="home_customer" <?php if(isset($result[0]['type']) && $result[0]['type'] == "c-h") echo "selected"; ?>>Home Customer</option>
					</select>
				</div>
				
				<div name="business-customer-detail" id="business-customer-detail">
					<table name="business-customer-table" id="business-customer-table">
						<tr name="company-name-field" id="company-name-field">
							<td><label>Company that you work for:</label></td>
							<td><input type="text" name="company-name" id="company-name" maxlength="50" onblur="return verifyAlbhabeticField('company-name')" value="<?php if(isset($resultFromType[0]['companyname'])) echo $resultFromType[0]['companyname']; ?>"></td>
						</tr>
						<tr name="business-annual-income-field" id="business-annual-income-field">
							<td><label>Your Annual Income:</label></td>
							<td><input type="text" name="business-annual-income" id="business-annual-income" maxlength="15" onblur="return verifyNumericField('business-annual-income')" value="<?php if(isset($resultFromType[0]['annualincome'])) echo $resultFromType[0]['annualincome'] ?>"></td>
						</tr>
					</table>
				</div>
				
				<div name="home-customer-detail" id="home-customer-detail">
					<label>Your Gender:</label>
					<select name="home-gender" id="home-gender">
						<option value="m" <?php if(isset($resultFromType[0]['gender']) && $resultFromType[0]['gender'] == "m") echo "selected"; ?>>Male</option>
						<option value="f" <?php if(isset($resultFromType[0]['gender']) && $resultFromType[0]['gender'] == "f") echo "selected"; ?>>Female</option>
					</select>
					<BR>
					<label>Your Marital Status:</label>
					<select name="home-maritalstatus" id="home-maritalstatus">
						<option value="m" <?php if(isset($resultFromType[0]['marriage']) && $resultFromType[0]['marriage'] == "m") echo "selected"; ?>>Married</option>
						<option value="s" <?php if(isset($resultFromType[0]['marriage']) && $resultFromType[0]['marriage'] == "s") echo "selected"; ?>>Single</option>
						<option value="d" <?php if(isset($resultFromType[0]['marriage']) && $resultFromType[0]['marriage'] == "d") echo "selected"; ?>>Divorced</option>
					</select>
					<table name="home-customer-table" id="home-customer-table">
						<tr name="annual-income-field" id="annual-income-field">
							<td><label>Your Annual Income:</label></td>
							<td><input type="text" name="home-annual-income" id="home-annual-income" maxlength="15" onblur="return verifyNumericField('home-annual-income')" value="<?php if(isset($resultFromType[0]['income'])) echo $resultFromType[0]['income']; ?>"></td>
						</tr>
					</table>
				</div>
				
				<div name="employee-detail" id="employee-detail">
					<table name="employee-table" id="employee-table">
						<tr name="employee-title-field" id="employee-title-field">
							<td><label>Your designation in this company:</label></td>
							<td><input type="text" name="employee-title" id="employee-title" maxlength="100" onblur="return verifyAlbhabeticField('employee-title')" value="<?php if(isset($resultFromType[0]['title'])) echo $resultFromType[0]['title']; ?>"></td>
						</tr>
						<tr name="employee-salary-field" id="employee-salary-field">
							<td><label>Your Annual Income:</label></td>
							<td><input type="text" name="employee-annual-income" id="employee-annual-income" maxlength="15" onblur="return verifyNumericField('employee-annual-income')" value="<?php if(isset($resultFromType[0]['salary'])) echo $resultFromType[0]['salary']; ?>"></td>
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