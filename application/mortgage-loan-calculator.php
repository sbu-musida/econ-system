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
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/calc.css">
<script type="text/javascript" src="js/calcHelper.js"></script>
<script type="text/javascript" src="js/calc.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Mortgage Calculator</title>
</head>
<body>

<table border="1" cellpadding="5" cellspacing="0" width="100%" bgcolor="#d3d3d3" style="text-align:center">
    <tr >
        <td colspan="3" style="background: #31b0d5;"><strong>Mortgage Calculator</strong></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="30%"><strong>Price per square foot</strong></td>
        <td width="40%"><input type="text" name="uprice" id="uprice" class="init" value="1500.00" onblur="showUprice();">R</td>
        <td width="30%"><span id="upriceMsg"></span></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="30%"><strong>Housing area</strong></td>
        <td width="40%"><input type="text" name="area" id="area" class="init" value="230.00" onblur="showArea();">square feet</td>
        <td width="30%"><span id="areaMsg"></span></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="30%"><strong>Amortization term</strong></td>
        <td width="40%">
            <select name="amort" id="amort" onblur="showAmort();changeInr();"  >
                <option value="">---Select a term---</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>years</td>
        <td width="30%"><span id="amortMsg"></span></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="30%"><strong>Down payment ratio</strong></td>
        <td width="40%"><input type="text" name="dpayr" id="dpayr" class="init" value="15" onblur="showDpayr();">%</td>
        <td width="30%"><span id="dpayrMsg"></span></td>
    </tr>

    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="30%"><strong>Interest rate</strong></td>
        <td width="40%"><input type="text" name="inr" id="inr" class="init" value="0.250" onblur="showInr();">%</td>
        <td width="30%"><span id="inrMsg"></span></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="30%"><strong>Commission rate</strong></td>
        <td width="40%"><input type="text" name="commr" id="commr" class="init" value="3" onblur="showCommr();">%</td>
        <td width="30%"><span id="commrMsg"></span></td>
    </tr>


</table>
<table border="1" cellpadding="5" cellspacing="0" width="100%" bgcolor="#d3d3d3" style="text-align:center">
    <tr>
        <td colspan="3" style="background: #31b0d5;"><strong>Calculation Result</strong></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="42.86%"><strong>Down payment</strong></td>
        <td width="57.14%"><span id="dpayMsg"></span> </td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="42.86%"><strong>Commission</strong></td>
        <td width="57.14%"><span id="commMsg"></span> </td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="42.86%"><strong>House price</strong></td>
        <td width="57.14%"><span id="hpriceMsg"></span> </td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="42.86%"><strong>Total interest</strong></td>
        <td width="57.14%"><span id="tinMsg"></span> </td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="42.86%"><strong>Monthly payment</strong></td>
        <td width="57.14%"><span id="mpayMsg"></span> </td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);">
        <td width="42.86%"><strong>Total payment</strong></td>
        <td width="57.14%"><span id="tpayMsg"></span> </td>
    </tr>
</table>


<table border="1" cellpadding="5" cellspacing="0" width="100%" bgcolor="#d3d3d3" style="text-align:center">
    <tr>
        <td colspan="3" style="background: #31b0d5;"><strong>Mathematics Formulas</strong></td>
    </tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);"><td width="100%">
        Down payment = Price per square foot * Housing area * Down payment ratio;
    </td></tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);"><td width="100%">
        Commission = Price per square foot * Housing area * Commission rate;
    </td></tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);"><td width="100%">
        Housing price = Price per square foot * Housing area;
    </td></tr>

    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);"><td width="100%">
        Total interest = (Price per square foot * Housing area) * (1 - Down payment ratio) * Interest rate * Amortization term;
    </td></tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);"><td width="100%">
        Monthly payment = (Price per square foot * Housing area) * (1 - Down payment ratio) * (1 + Interest rate) / (12 * Amortization term);
    </td></tr>
    <tr onmouseenter="mouseIn(this);" onmouseleave="mouseOut(this);"><td width="100%">
        Total payment = (Price per square foot * Housing area) * (1 + Commission rate + Amortization term * Interest rate);
    </td></tr>
    </tr>
</table>
<span id="time"></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div>
<a href="welcome.php" class="btn btn-outline-primary">Back</a> 
</div>
</body>
</html>