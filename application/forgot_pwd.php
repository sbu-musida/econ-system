<?php error_reporting(0); ?>
<?php
session_start();
  // Include config file
  require_once "config/config.php";

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $result = mysqli_query($mysql_db,"SELECT * FROM user_passwords where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_email=$row['email'];
	$email_id=$row['email'];
	$password=$row['password'];
	if($email==$fetch_email) {
	  
				$to = $email_id;
                $subject = "Password Recovery";
                $txt = "Your password is : $password.";
                $headers = "From: sbu.musida@gmail.com" . "\r\n" .
                "CC: somebody@example.com";
                mail($to,$subject,$txt,$headers);
?>
<script type="text/javascript">
                setTimeout(function() { alert("Check your Email Inbox"); }, 1000);
</script>
<?php
			}
				else{
				    echo '<h2>Invalid Email Entered, Please Try Again</h2>';
				    exit;
				}
}
?>
<!DOCTYPE HTML>
<html>
<title>Forgot Your Password</title>
<head>
 <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
<style>
    .wrapper{ 
      width: 500px; 
      padding: 20px; 
    }
    .wrapper h2 {text-align: center}
    .wrapper form .form-group span {color: red;}
	
	.button {
  background-color: #0099ff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="stylesheet" href="RemoveBranding.css">
</head>
<body>
    <section class="container wrapper">
      <h2 class="display-4 pt-3">Forgot Password</h2>
          <p class="text-center">Please fill this form to recover your password.</p>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="" required>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-block btn-outline-primary" id="submit" name="submit" value="submit">
            </div>
          </form>
		  
		  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <div class="center"style="text-align: center">
		       <a href="index.html" class="button btn-outline-primary">Back</a>
		</div> 
    </section>
</body>
</html>