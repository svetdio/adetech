<?php
session_start();
if (isset($_SESSION['login_details'])) {
	$app_role = $_SESSION['login_details']['app_role'];
	if ($app_role == 0) {
		echo "<script type='text/javascript'>
            alert('You are not supposed to be here. Redirecting..')
            window.location = 'bundle1.php';
        </script>";
	}
} else {
	echo "<script type='text/javascript'> 
  localStorage.removeItem('adetech_user');
  window.location = 'login.php'
</script>";
}
require_once "config.php";
if (isset($_GET['emp_id'])) {
	$data = file_get_contents($host_url . '/api/get_emp.php');
	$parseData = json_decode($data, true);
	$employee = array();
	foreach ($parseData as $v) {
		if ($v['id'] == $_GET['emp_id']) {
			$employee = $v;
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/webpage2.css">
	<script src='js/jquery.min.js'> </script>
	<script src="js/alpine.min.js"></script>
	<script src="js/webpage2.js"></script>
	<title>Payroll | AllShirt Commercial Outlet</title>

</head>

<body class="bg">
	<p><img src="favicon.ico" width="30" height="30">PAYROLL SYSTEM<img src="favicon.ico" width="30" height="30">
		<!--buttons-->
	<div class="anchors">
		<!--home-->
		<button class="button8">
			<a href="home.php" class="flex items-center">
				<img class="home" src="favicon.ico">
			</a>
		</button>
		<div class="space">
		</div>
		<!--webpage 1-->
		<button class="button8">
			<a href="bundle1.php" class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bundle" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
					<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
				</svg>
			</a>
		</button>
		<div class="space">
		</div>
		<!--webpage 2-->
		<button class="button9">
			<a href="webpage2_new.php" class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="payroll" viewBox="0 0 16 16">
					<path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
					<path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
				</svg>
			</a>
		</button>
		<div class="space">
		</div>
		<!--webpage 3-->
		<button class="button8">
			<a href="webpage3.php" class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-bag-plus" viewBox="0 0 16 16">
					<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z" />
				</svg>
			</a>
		</button>
		<div class="space">
		</div>
		<!-- employee list -->
		<button class="button8">
			<a href="employee_listview.php" class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-bag-plus" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
				</svg>
			</a>
		</button>
		<div class="space">
		</div>
		<button class="button8">
			<a href="sales_report.php" class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-bag-plus" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
				</svg>
			</a>
		</button>
		<div class="space">
		</div>
		<button class="button8">
			<a href="products.php" class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-bag-plus" viewBox="0 0 16 16">
					<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z" />
				</svg>
			</a>
		</button>
		<div class="space">
		</div>
		<!--log out-->
		<button class="button8">
			<a href="#" id="logout" class="flex items-center bottom-0  " onclick="logout()">
				<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="h-6 w-6" viewBox="0 0 16 16">
					<path d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
					<path d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
				</svg>
			</a>
		</button>
	</div>
	</p>
	<div class="div1">
		<div class="ebi">
			<h1 class="ebitxt">EMPLOYEE BASIC INFO</h1>
		</div>

		<input type="file" name="inpFile" id="inpFile" style="position: absolute;top: 35%;left: 30%;">

		<div class="forimg">
			<div class="image-preview" id="imagePreview">
				<img src="" alt="Image Preview" class="image-preview__image">
				<span class="image-preview__default-text">Image Preview</span>
			</div>
		</div>


		<div class="fortable">

			<!-- FOR CATEGORY TEXT -->

			<table style="padding: 1%;">
				<tr style="position: absolute;">
					<td style="font-family: arial;font-size: 15px;">First Name:</td>
				</tr>
				<tr style="position:absolute; top: 12%;">
					<td style="font-family: arial;font-size: 15px;">Middle Name:</td>
				</tr>
				<tr style="position:absolute; top: 22%;">
					<td style="font-family: arial;font-size: 15px;">Last Name:</td>
				</tr>
				<tr style="position:absolute; top: 33%;">
					<td style="font-family: arial;font-size: 15px;">Civil Status:</td>
				</tr>
				<tr style="position:absolute; top: 44%;">
					<td style="font-family: arial;font-size: 15px;">Designation:</td>
				</tr>
				<tr style="position:absolute; top: 55%;">
					<td style="font-family: arial;font-size: 15px;">Pay Date:</td>
				</tr>
				<tr style="position:absolute; top: 66%;">
					<td style="font-family: arial;font-size: 15px;">Employee Status:</td>
				</tr>

				<!-- FOR USER INPUT -->

				<tr>
					<form>
						<input type="text" name="First Name" style="position: absolute;left: 35%;top: 2%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
						<input type="text" name="Midlle Name" style="position: absolute;left: 35%;top: 12%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
						<input type="text" name="Last Name" style="position: absolute;left: 35%;top: 22%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
						<input type="text" name="Civil Status" style="position: absolute;left: 35%;top: 33%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
						<input type="text" name="Designation" style="position: absolute;left: 35%;top: 44%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
						<input type="text" name="Pay Date" style="position: absolute;left: 35%;top: 55%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
						<input type="text" name="Employee Status" style="position: absolute;left: 35%;top: 66%; font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="30%">
					</form>
				</tr>
			</table>
		</div>
	</div>

	<div class="div2">
		<!-- BASIC INCOME VAR -->
		<div class="ebi2">
			<h1 class="ebitxt">Basic Income</h1>
		</div>
		<label for="Rate/Hour">Rate/Hour:</label>
		<input id="rph1" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="15%">&nbsp;&nbsp;
		<label for="No. of Hour/Cut off">No. of Hour/Cut off:</label>
		<input id="cutoff1" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="15%">&nbsp;&nbsp;
		<label for="Income/Cut off">Income/Cut off:</label>
		<input id="result1" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #faaadd; font-weight: bold;" size="15%" readonly>

		<!-- HONORARIUM INCOME VAR -->
		<div class="ebi2">
			<h1 class="ebitxt">Honorarium Income</h1>
		</div>
		<label for="Rate/Hour">Rate/Hour:</label>
		<input id="rph2" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="15%">&nbsp;&nbsp;
		<label for="No. of Hour/Cut off">No. of Hour/Cut off:</label>
		<input id="cutoff2" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="15%">&nbsp;&nbsp;
		<label for="Income/Cut off">Income/Cut off:</label>
		<input id="result2" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #faaadd;font-weight: bold;" size="15%" readonly>


		<!-- OTHER INCOME VAR -->
		<div class="ebi2">
			<h1 class="ebitxt">Other Income</h1>
		</div>
		<label for="Rate/Hour">Rate/Hour:</label>
		<input id="rph3" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="15%">&nbsp;&nbsp;
		<label for="No. of Hour/Cut off">No. of Hour/Cut off:</label>
		<input id="cutoff3" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6;" size="15%">&nbsp;&nbsp;
		<label for="Income/Cut off">Income/Cut off:</label>
		<input id="result3" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #faaadd;font-weight: bold;" size="15%" readonly>



		<div class="ebi2">
			<h1 class="ebitxt">Summary Income</h1>
		</div>

		<!-- GROSS INCOME VAR -->
		<label for="Gross Income">Gross Income:</label>
		<input id="GIResult" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #faaadd;font-weight: bold;" size="15%" readonly>&nbsp;&nbsp;

		<!-- NET INCOME VAR -->
		<label for="Net Income">Net Income:</label>
		<input id="NIResult" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #faaadd;font-weight: bold;" size="15%" readonly><br><br>&nbsp;&nbsp;



		<div class="ebi2">
			<h1 class="ebitxt">Regular Deductions</h1>
		</div>

		<label for="SSS Contribution">SSS Contribution:</label>
		<input id="sssC" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #a0fae9;font-weight: bold" size="15%" value="200" readonly>&nbsp;&nbsp;

		<label for="PhilHealth">PhilHealth Contribution:</label>
		<input id="phC" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #a0fae9;font-weight: bold;" size="15%" value="100" readonly>&nbsp;&nbsp;

		<label for="PagIbig Contribution">PagIbig Contribution:</label>
		<input id="piC" type="text" style=" font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #a0fae9;font-weight: bold;" size="10%" value="100" readonly><br><br>

		<label for="Income Tax Contribution">Income Tax Contribution:</label>
		<input type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #a0fae9;font-weight: bold;" size="15%" readonly value="0%"><br>

		<div class="ebi2">
			<h1 class="ebitxt">Other Deductions</h1>
		</div>
		<label for="SSS Loan">SSS Loan:</label>
		<input id="sssl" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #ff8091;font-weight: bold" size="15%">&nbsp;&nbsp;


		<label for="PagIbig Loan">PagIbig Loan:</label>
		<input id="pil" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #ff8091;font-weight: bold;" size="15%">&nbsp;&nbsp;


		<label for="Faculty Savings Deposit">Faculty Savings Deposit:</label>
		<input id="fsd" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #ff8091;font-weight: bold" size="15%">&nbsp;&nbsp;<br><br>


		<label for="Faculty Savings Loan">Faculty Savings Loan:</label>
		<input id="fsl" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #ff8091;font-weight: bold" size="15%">&nbsp;&nbsp;


		<label for="Salary Loan">Salary Loan:</label>
		<input id="sl" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #ff8091;font-weight: bold" size="15%">&nbsp;&nbsp;


		<label for="Other Loans">Other Loans:</label>
		<input id="ol" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #ff8091;font-weight: bold;" size="15%">&nbsp;&nbsp;

		<div class="ebi2">
			<h1 class="ebitxt">Deduction Summary</h1>
		</div>
		<label for="Total Deductions">Total Deductions:</label>
		<input id="TotalDeductionResult" type="text" style="font-family: arial;border: 1px solid black;border-radius: 5%; background-color: #e6e6e6; color: red;font-weight: bold;" size="15%" readonly><br><br>

		<!-- Buttons -->

		<div class="button">
			<button class="button1" onclick="calc();">Calculate Gross Income</button>
			<button class="button button2" onclick="calcNI();">Calculate Net Income</button>
			<a href="webpage2.html"><button class="button button3">New</button></a>
			<button class="button button4">Print Preview</button>
			<button class="button button5">Print Payslip</button>
			<button class="button button6">Close</button>
		</div>

		<script type="text/javascript">
			const inpFile = document.getElementById("inpFile");
			const previewContainer = document.getElementById("imagePreview");
			const previewImage = previewContainer.querySelector(".image-preview__image");
			const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

			inpFile.addEventListener("change", function() {
				const file = this.files[0];

				if (file) {
					const reader = new FileReader();

					previewDefaultText.style.display = "none";
					previewImage.style.display = "block";

					reader.addEventListener("load", function() {
						previewImage.setAttribute("src", this.result);
					});

					reader.readAsDataURL(file);
				} else {
					previewDefaultText.style.display = null;
					previewImage.style.display = null;
					previewImage.setAttribute("src", "");
				}
			});
		</script>
</body>

</html>