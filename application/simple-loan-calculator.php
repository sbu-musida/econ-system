<?php
   // Initialize session
   session_start();
   
   if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
   	header('location: login.php');
   	exit;
   }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Loan Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
		body {
			background-color: white;
			font-family: 'Trebuchet MS';
		}
		
		h1 {
			font-size: 35px;
		}
		
		h1 {
			font-size: 21px;
			margin-top: 20px;
		}
		
		.calculator {
			width: 400px;
			height: 450px;
			background-color: black;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translateX(-50%) translateY(-50%);
			padding: 20px 0px 0px 100px;
			border-radius: 50px;
			color: white;
		}
		
		input {
			padding: 7px;
			width: 70%;
			margin-top: 7px;
		}
	</style>
</head>

<body>

	<div class="calculator">
		<h1>Loan Calculator</h1>

		<!-- Calling Calculate function defined in app.js -->

		<p>Amount in Rands(R)	:   
			<input id="amount" type="number"
			onchange="Calculate()">
		</p>

		<p>Interest Rate :
			<input id="rate" type="number"
			onchange="Calculate()">
		</p>

		<p>Months to Pay :
			<input id="months" type="number"
			onchange="Calculate()">
		</p>
         
		<h2 id="total">0.00</h2>
		
		<a href="welcome.php" class="btn btn-outline-primary center">Back</a> 
	</div>

	<script src="app.js"></script>
	
</body>

</html>


