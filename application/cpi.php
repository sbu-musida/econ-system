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
	<meta charset="UTF-8">
	<title>Consumer Price Index (CPI)</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 500px; 
        	padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
		
		img {
           display: block;
           margin-left: auto;
           margin-right: auto;
		   width:400px;
		   height:400px;
        }
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h2 class="display-5">Consumer Price Index (CPI)</h2>
				<p>The Consumer Price Index (CPI) measures the monthly change in prices paid by a country's consumers.</p>
			</div>
            <img src="charts/cpi.png" alt="" class="center">
			<a href="welcome.php" class="btn btn-block btn-outline-primary">Back</a> 

		</section>
	</main>
</body>
</html>