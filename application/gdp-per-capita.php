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
	<title>GDP Per Capita</title>
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
				<h2 class="display-5">GDP Per Capita</h2>
				<p>Per capita gross domestic product (GDP) is a financial metric that breaks down a country's economic output per person and is calculated by dividing the GDP of a nation by its population.</p>
			</div>
            <img src="charts/gdp-per-capita.png" alt="" class="center">
			<a href="welcome.php" class="btn btn-block btn-outline-primary">Back</a> 

		</section>
	</main>
</body>
</html>