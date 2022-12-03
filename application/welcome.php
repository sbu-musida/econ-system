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
      <title>Welcome</title>
      <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
      <style>
         .wrapper{ 
         width: 500px; 
         padding: 20px; 
         }
         .wrapper h2 {text-align: center}
         .wrapper form .form-group span {color: red;}
      </style>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
   </head>
   <body>
      <main>
         <section class="container wrapper">
            <div class="page-header">
               <h2 class="display-5"> <?php echo $_SESSION['username']; ?></h2>
            </div>
         </section>
         <div class="center">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container center">
               <div id="tradingview_da5f9"></div>
               &nbsp;
               <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
               <script type="text/javascript">
                  new TradingView.widget(
                  {
                  
                  "autosize": false,
                  "symbol": "FX:USDZAR",
                  "interval": "D",
                  "timezone": "Etc/UTC",
                  "theme": "light",
                  "style": "1",
                  "locale": "en",
                  "toolbar_bg": "#f1f3f6",
                  "enable_publishing": false,
                  "allow_symbol_change": true,
                  "container_id": "tradingview_da5f9"
                  }
                  );
               </script>
            </div>
            <!-- TradingView Widget END -->
         </div>
         <section class="container wrapper">
            <a href="inflation.php" class="btn btn-block btn-outline-primary">Inflation</a> 
            <a href="gdp.php" class="btn btn-block btn-outline-primary">Gross Domestic Product (GDP)</a> 
			<a href="cpi.php" class="btn btn-block btn-outline-primary">Consumer Price Index (CPI)</a> 
            <a href="gdp-per-capita.php" class="btn btn-block btn-outline-primary">GDP Per Capita</a>
            <a href="simple-loan-calculator.php" class="btn btn-block btn-outline-success">Simple Loan Calculator</a>
			<a href="auto-vehicle-loan-calculator.php" class="btn btn-block btn-outline-success">Auto Vehicle Loan Calculator</a>
			<a href="mortgage-loan-calculator.php" class="btn btn-block btn-outline-success">Mortgage Loan Calculator</a>
            <a href="password_reset.php" class="btn btn-block btn-outline-warning">Reset Password</a>
            <a href="logout.php" class="btn btn-block btn-outline-danger">Sign Out</a>
         </section>
      </main>
   </body>
</html>