<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Auto Vehicle Loan Calculator</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <style>
         .wrapper{ 
         width: 500px; 
         padding: 20px; 
         }
         .wrapper h2 {text-align: center}
         .wrapper form .form-group span {color: red;}
    </style>
	
	<script>
		var vehicle_price=prompt("Please enter the price of the vehicle.","");
		var down_payment=prompt("Please enter the down payment amount.","");
		var annual_int_rate=prompt("Please enter the loan's annual interest rate (e.g. 7.5)","");
		vehicle_price = parseFloat(vehicle_price);
		down_payment = parseFloat(down_payment);
		annual_int_rate = parseFloat(annual_int_rate);
		var loan_amount = (vehicle_price - down_payment);
		//loan_amount = loan_amount.toFixed(2);
		var monthly_int_rate = (annual_int_rate / 1200);
	
		function calc_payment(num_months, monthly_int_rate, loan_amount){
			var base = Math.pow(1 + monthly_int_rate, num_months);
			var payment = (loan_amount * monthly_int_rate / (1 - (1 / base)));
			
			return payment.toFixed(2);
		}
		
	</script>

	<style>
		body{background-color:white}
	</style>
</head>
<body>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="text-align:center">
	<h1><b>Auto Vehicle Loan Calculator</b></h1>
	
	<pre>
	<script>
	var nf = new Intl.NumberFormat();
		document.write("Vehicle price: " + "R" + nf.format(vehicle_price) + "</br>");
		document.write("Down payment: " + "R" + nf.format(down_payment) + "</br>");
		document.write("Interest Rate: " + nf.format(annual_int_rate) + "%" + "</br>");
		document.write("Loan Amount: " + "R" + nf.format(loan_amount) + "</br>");
		document.write("# of Months		Payments/Month</br>");
		for(num_months = 24; num_months < 61; num_months = num_months + 12) {
			document.write(num_months + "			R" + nf.format(calc_payment(num_months, monthly_int_rate, loan_amount)) + "</br>");
		}//end for loop

	</script>
	</pre>
	</div>
	<section class="container wrapper">
	<a href="welcome.php" class="btn btn-block btn-outline-primary">Back</a> 
	</section>
</body>
</html>