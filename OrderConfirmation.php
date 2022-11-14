<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Confirmation</title>
	<style type='text/css'>
	html,body,select {
		font-size: 25px;
		text-align: center;
	}
	table {
		 margin-left: auto;
		 margin-right: auto;
	}
	body {
		background: #465259;
		color: #aeb766;
	}
</style>

</head>
<body>
	<h1>Two Owls Cafe</h1>
	<h2>Open From 7:00 PM to 2:00AM</h2>
	<?php
	//get the info
	$quan1 = $_GET["quan1"];
	$price1 = 4.76;
	$quan2 = $_GET["quan2"];
	$price2 = 4.25;
	$quan3 = $_GET["quan3"];
	$price3 = 2.36;
	$quan4 = $_GET["quan4"];
	$price4 = 2.71;
	$quan5 = $_GET["quan5"];
	$price5 = 2.50;
	//print the users order
	echo "<div>";
	if ($quan1 != 0) {
		if ($quan1 == 1) {
			echo "You ordered $quan1 Chocolate Croissant, for $$price1";
		} else {
			echo "You ordered $quan1 Chocolate Croissants, for $$price1";
		}
		echo "<br>";
	}
	if ($quan2 != 0) {
		if ($quan2 == 1) {
			echo "You ordered $quan2 Blueberry Scone, for $$price2";
		} else {
			echo "You ordered $quan2 Blueberry Scones, for $$price2";
		}
		echo "<br>";
	}
	if ($quan3 != 0) {
		if ($quan3 == 1) {
			echo "You ordered $quan3 Snickerdoodle Cookie, for $$price3";
		} else {
			echo "You ordered $quan3 Snickerdoodle Cookies, for $$price3";
		}
		echo "<br>";
	}
	if ($quan4 != 0) {
		if ($quan4 == 1) {
			echo "You ordered $quan4 Corn Muffin, for $$price4";
		} else {
			echo "You ordered $quan4 Corn Muffins, for $$price4";
		}
		echo "<br>";
	}
	if ($quan5 != 0) {
		if ($quan5 == 1) {
			echo "You ordered $quan5 Blueberry Muffin, for $$price5";
		} else {
			echo "You ordered $quan5 Blueberry Muffins, for $$price5";
		}
		echo "<br>";
	}
	echo "</div>";
	//calculate values
	$subtotal = $quan1 * $price1 + $quan2 * $price2 + $quan3 * $price3 + $quan4 * $price4 + $quan5 * $price5;
	$maTax = .0625 * $subtotal;
	$maTax = round($maTax, 2);
	$total  = $subtotal + $maTax;
	echo "<div>";
	echo "Your subtotal is: $subtotal <br>";
	echo "Sales tax of 6.25%: $maTax <br>";
	echo "Your total is: $total";
	echo "</div>";
	?>
	<div id = dateAndTime></div>
	<script>
		//print date and time, in military
		const currentDate = new Date();
		const finished = new Date(currentDate.getTime() + 15 * 60 * 1000);
		const hour = finished.getHours();
		const minutes = finished.getMinutes();
		document.getElementById("dateAndTime").innerHTML = "Your order will be ready in 15 minutes, at ";
		document.getElementById("dateAndTime").innerHTML += hour;
		document.getElementById("dateAndTime").innerHTML += ":";
		if(minutes >= 0 && minutes <= 9) {
			document.getElementById("dateAndTime").innerHTML += "0";
		}
		document.getElementById("dateAndTime").innerHTML += minutes;
	</script>
</body>
</html>